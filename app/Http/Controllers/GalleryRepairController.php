<?php

namespace App\Http\Controllers;

use App\Models\GalleryRepairImageStat;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class GalleryRepairController extends Controller
{
    private const DISK = 'public';

    private const DIRECTORY = 'gallery-repair';

    public function index(): View
    {
        $images = $this->listImages();
        shuffle($images);

        return view('gallery', [
            'images' => $images,
        ]);
    }

    public function trackView(Request $request, string $filename): JsonResponse
    {
        if (! $this->isSafeFilename($filename)) {
            return response()->json([
                'ok' => false,
            ], 404);
        }

        $path = self::DIRECTORY.'/'.$filename;
        $disk = Storage::disk(self::DISK);
        if (! $disk->exists($path)) {
            return response()->json([
                'ok' => false,
            ], 404);
        }

        $stat = GalleryRepairImageStat::query()->firstOrCreate([
            'filename' => $filename,
        ], [
            'views' => 0,
        ]);

        $stat->increment('views');

        return response()->json([
            'ok' => true,
            'views' => $stat->views,
        ]);
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
                'url' => asset('storage/'.$path),
                'last_modified' => $disk->lastModified($path),
            ];
        }

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
