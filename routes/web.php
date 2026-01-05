<?php

use App\Http\Controllers\Admin\GalleryRepairController as AdminGalleryRepairController;
use App\Http\Controllers\Admin\PricelistImportController;
use App\Http\Controllers\Admin\PricelistManagerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryRepairController;
use App\Http\Controllers\PricelistController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::get('/pricelist', [PricelistController::class, 'show'])->name('pricelist');
Route::get('/pricelist/ipad', [PricelistController::class, 'showIpad'])->name('pricelist.ipad');
Route::get('/pricelist/macbook', [PricelistController::class, 'showMacbook'])->name('pricelist.macbook');
Route::get('/pricelist/iwatch', [PricelistController::class, 'showIwatch'])->name('pricelist.iwatch');
Route::get('/pricelist/android', [PricelistController::class, 'showAndroid'])->name('pricelist.android');
Route::view('/promo', 'placeholder', [
    'title' => 'Promo',
    'description' => 'Placeholder sementara untuk promo. Konten asli akan diisi setelah migrasi.',
])->name('promo');
Route::get('/gallery', [GalleryRepairController::class, 'index'])->name('gallery');
Route::view('/contact', 'placeholder', [
    'title' => 'Contact Us',
    'description' => 'Placeholder sementara untuk halaman kontak. Informasi lengkap akan ditambahkan.',
])->name('contact');
Route::view('/about', 'placeholder', [
    'title' => 'About US',
    'description' => 'Placeholder sementara untuk informasi tentang Fixmi Bali.',
])->name('about');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Route::get('/dashboard/pricelist', [PricelistManagerController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.pricelist.index');
Route::get('/dashboard/gallery', [AdminGalleryRepairController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('admin.gallery.index');
Route::post('/gallery/view/{filename}', [GalleryRepairController::class, 'trackView'])
    ->name('gallery.view');
Route::middleware('auth')->group(function () {
    Route::post('/dashboard/pricelist-import/{section}', [PricelistImportController::class, 'store'])
        ->middleware(['verified'])
        ->name('admin.pricelist.import');
    Route::delete('/dashboard/pricelist-import/{section}', [PricelistImportController::class, 'destroy'])
        ->middleware(['verified'])
        ->name('admin.pricelist.delete');
    Route::post('/dashboard/pricelist-import/{section}/undo', [PricelistImportController::class, 'undo'])
        ->middleware(['verified'])
        ->name('admin.pricelist.undo');
    Route::post('/dashboard/gallery', [AdminGalleryRepairController::class, 'store'])
        ->middleware(['verified'])
        ->name('admin.gallery.store');
    Route::post('/dashboard/gallery/temp', [AdminGalleryRepairController::class, 'storeTemp'])
        ->middleware(['verified'])
        ->name('admin.gallery.temp');
    Route::post('/dashboard/gallery/temp/clear', [AdminGalleryRepairController::class, 'clearTemp'])
        ->middleware(['verified'])
        ->name('admin.gallery.temp.clear');
    Route::post('/dashboard/gallery/commit', [AdminGalleryRepairController::class, 'commitTemp'])
        ->middleware(['verified'])
        ->name('admin.gallery.commit');
    Route::delete('/dashboard/gallery/{filename}', [AdminGalleryRepairController::class, 'destroy'])
        ->middleware(['verified'])
        ->name('admin.gallery.destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
