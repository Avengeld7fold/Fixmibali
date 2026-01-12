<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PromoController extends Controller
{
    private const DISK = 'public';

    private const DIRECTORY = 'promo';

    public function index(): View
    {
        return view('promo', [
            'images' => $this->listImages(),
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

        usort($images, fn (array $a, array $b) => $a['last_modified'] <=> $b['last_modified']);

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
