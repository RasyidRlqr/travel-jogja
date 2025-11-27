<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::middleware('track.views')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
    Route::get('/blog/{slug}', [HomeController::class, 'blogDetail'])->name('blog.detail');
    Route::get('/services', [HomeController::class, 'services'])->name('services');
    Route::get('/tours', [HomeController::class, 'tours'])->name('tours');
    Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
});

// Auth Routes
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Test Route for Image URL
Route::get('/test-image-url', function () {
    return view('test-image-url');
});

// Demo Image URL functionality without database
Route::get('/demo-image-url', function () {
    // Simulate blog data with image URL
    $demoBlog = (object) [
        'title' => 'Demo: Gambar dari URL Imgur',
        'content' => 'Ini adalah demo untuk menunjukkan bahwa fitur image URL sudah berfungsi dengan baik. Gambar di bawah ini dimuat langsung dari URL external.',
        'created_at' => now(),
        'image_source' => 'https://i.imgur.com/GYPpzEe.jpeg'
    ];

    return view('demo-image-url', compact('demoBlog'));
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // User Management
    Route::resource('user', App\Http\Controllers\Admin\UserController::class)->except(['create', 'store', 'show']);

    // Blog Management
    Route::resource('blog', App\Http\Controllers\Admin\BlogController::class);

    // Service Management
    Route::resource('service', App\Http\Controllers\Admin\ServiceController::class);

    // Tour Management
    Route::resource('tour', App\Http\Controllers\Admin\TourController::class);

    // Gallery Management
    Route::resource('gallery', App\Http\Controllers\Admin\GalleryController::class);
});

require __DIR__.'/auth.php';

