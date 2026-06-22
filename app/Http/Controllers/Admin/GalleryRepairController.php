<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryRepairImageStat;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class GalleryRepairController extends Controller
{
    private const DISK = 'public';

    private const DIRECTORY = 'gallery-repair';

    private const TEMP_DISK = 'local';

    private const TEMP_DIRECTORY = 'tmp/gallery-repair';

    public function index(): View
    {
        return view('admin.gallery', [
            'images' => $this->listImages(),
        ]);
    }

    public function store(Request $request): RedirectResponse|JsonResponse
    {
        $validated = $request->validate([
            'images' => ['required', 'array', 'min:1'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $disk = Storage::disk(self::DISK);

        foreach ($validated['images'] as $file) {
            $extension = strtolower($file->getClientOriginalExtension() ?: $file->guessExtension() ?: '');
            if (! in_array($extension, ['jpg', 'jpeg', 'png', 'webp'], true)) {
                continue;
            }

            $filename = Str::uuid()->toString().'.'.$extension;
            $disk->putFileAs(self::DIRECTORY, $file, $filename);
        }

        if ($request->expectsJson()) {
            return response()->json([
                'ok' => true,
            ]);
        }

        return redirect()
            ->route('admin.gallery.index')
            ->with('status', 'Gambar berhasil diupload.');
    }

    public function storeTemp(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'images' => ['required', 'array', 'min:1'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        $disk = Storage::disk(self::TEMP_DISK);
        $map = $request->session()->get('gallery_repair_temp', []);
        if (! is_array($map)) {
            $map = [];
        }

        // ponytail: abuse-limit — cap uncommitted temp uploads per session so a
        // client that never commits cannot bloat the session row indefinitely.
        // Upgrade: add a scheduled purge for orphaned temp files on disk.
        if (count($map) >= 50) {
            return response()->json([
                'ok' => false,
                'message' => 'Too many pending uploads. Commit or clear the current batch first.',
            ], 422);
        }

        $items = [];
        foreach ($validated['images'] as $file) {
            $extension = strtolower($file->getClientOriginalExtension() ?: $file->guessExtension() ?: '');
            if (! in_array($extension, ['jpg', 'jpeg', 'png', 'webp'], true)) {
                continue;
            }

            $token = Str::uuid()->toString();
            $tempFilename = $token.'.'.$extension;
            $path = self::TEMP_DIRECTORY.'/'.$tempFilename;
            $disk->putFileAs(self::TEMP_DIRECTORY, $file, $tempFilename);

            $map[$token] = [
                'path' => $path,
                'original_name' => $file->getClientOriginalName(),
            ];

            $items[] = [
                'token' => $token,
            ];
        }

        $request->session()->put('gallery_repair_temp', $map);

        return response()->json([
            'ok' => true,
            'items' => $items,
        ]);
    }

    public function commitTemp(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'tokens' => ['required', 'array', 'min:1'],
            'tokens.*' => ['string'],
        ]);

        $map = $request->session()->get('gallery_repair_temp', []);
        if (! is_array($map)) {
            $map = [];
        }

        $tokens = $validated['tokens'];
        foreach ($tokens as $token) {
            if (! isset($map[$token]['path']) || ! is_string($map[$token]['path'])) {
                return response()->json([
                    'ok' => false,
                    'message' => 'Upload sementara tidak ditemukan. Refresh halaman lalu coba lagi.',
                ], 422);
            }
        }

        $tempDisk = Storage::disk(self::TEMP_DISK);
        $publicDisk = Storage::disk(self::DISK);
        $moved = 0;

        foreach ($tokens as $token) {
            $path = $map[$token]['path'];
            if (! $tempDisk->exists($path)) {
                unset($map[$token]);

                continue;
            }

            $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
            if (! in_array($extension, ['jpg', 'jpeg', 'png', 'webp'], true)) {
                $tempDisk->delete($path);
                unset($map[$token]);

                continue;
            }

            $finalFilename = Str::uuid()->toString().'.'.$extension;
            $finalPath = self::DIRECTORY.'/'.$finalFilename;

            $stream = $tempDisk->readStream($path);
            if ($stream === false) {
                continue;
            }

            // ponytail: data-loss — verify the write succeeded before deleting the
            // temp source, otherwise a failed put (disk full / perms) would lose
            // the upload silently.
            $putOk = $publicDisk->put($finalPath, $stream);
            if (is_resource($stream)) {
                fclose($stream);
            }
            if ($putOk === false) {
                continue;
            }

            $tempDisk->delete($path);
            unset($map[$token]);
            $moved += 1;
        }

        $request->session()->put('gallery_repair_temp', $map);

        return response()->json([
            'ok' => true,
            'moved' => $moved,
        ]);
    }

    public function clearTemp(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'tokens' => ['nullable', 'array'],
            'tokens.*' => ['string'],
        ]);

        $map = $request->session()->get('gallery_repair_temp', []);
        if (! is_array($map)) {
            $map = [];
        }

        $tokens = $validated['tokens'] ?? array_keys($map);
        $tempDisk = Storage::disk(self::TEMP_DISK);
        $deleted = 0;

        foreach ($tokens as $token) {
            if (! isset($map[$token]['path']) || ! is_string($map[$token]['path'])) {
                continue;
            }

            $path = $map[$token]['path'];
            if ($tempDisk->exists($path)) {
                $tempDisk->delete($path);
                $deleted += 1;
            }

            unset($map[$token]);
        }

        $request->session()->put('gallery_repair_temp', $map);

        return response()->json([
            'ok' => true,
            'deleted' => $deleted,
        ]);
    }

    public function destroy(string $filename): RedirectResponse
    {
        if (! $this->isSafeFilename($filename)) {
            abort(404);
        }

        $path = self::DIRECTORY.'/'.$filename;
        $disk = Storage::disk(self::DISK);

        if ($disk->exists($path)) {
            $disk->delete($path);
        }

        GalleryRepairImageStat::query()
            ->where('filename', $filename)
            ->delete();

        return redirect()
            ->route('admin.gallery.index')
            ->with('status', 'Gambar berhasil dihapus.');
    }

    private function listImages(): array
    {
        $disk = Storage::disk(self::DISK);
        $paths = $disk->files(self::DIRECTORY);

        $images = [];
        foreach ($paths as $path) {
            $filename = basename($path);
            if (! $this->isSafeFilename($filename)) {
                continue;
            }

            $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            if (! in_array($extension, ['jpg', 'jpeg', 'png', 'webp'], true)) {
                continue;
            }

            $images[] = [
                'filename' => $filename,
                'path' => $path,
                'url' => asset('storage/'.$path),
                'last_modified' => $disk->lastModified($path),
            ];
        }

        $stats = GalleryRepairImageStat::query()
            ->whereIn('filename', array_map(fn (array $image) => $image['filename'], $images))
            ->get()
            ->keyBy('filename');

        foreach ($images as &$image) {
            $image['views'] = (int) ($stats[$image['filename']]->views ?? 0);
        }
        unset($image);

        usort($images, fn (array $a, array $b) => $b['last_modified'] <=> $a['last_modified']);

        return $images;
    }

    private function isSafeFilename(string $filename): bool
    {
        if ($filename === '' || $filename !== basename($filename)) {
            return false;
        }

        return (bool) preg_match('/^[A-Za-z0-9._-]+$/', $filename);
    }
}
