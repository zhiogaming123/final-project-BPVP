<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ZoneController;
use App\Http\Controllers\AttractionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReviewController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->name('landing.')->group(function () {
    Route::get('/', function () {
            $zones = \App\Models\Zone::all();
            $attractions = \App\Models\Attraction::all();
        return view('landing.pages.index', compact('zones', 'attractions'));
    })->name('index');    

    Route::get('/detail', function () {
        return view('landing.pages.detail');
    })->name('detail');

    // Review routes
    Route::get('/reviews', [\App\Http\Controllers\ReviewController::class, 'index'])->name('reviews.index');
    Route::post('/reviews', [\App\Http\Controllers\ReviewController::class, 'store'])->name('reviews.store');

    // Zones and Attractions routes for landing
    Route::get('/zones/{id}', [ZoneController::class, 'show'])->name('zones.show');
    Route::get('/attractions/{id}', [AttractionController::class, 'show'])->name('attractions.show');
});



Route::get('/detail', function () {
    return view('landing.pages.detail');
});

Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/', function () {

    $zones = \App\Models\Zone::all();
    $attractions = \App\Models\Attraction::all();
    $reviews = \App\Models\Review::all();
    $publishedReviews = \App\Models\Review::where('is_approved', true)->get();
    $unpublishedReviews = \App\Models\Review::where('is_approved', false)->get();
    $counter = [
        'zones' => $zones->count(),
        'attractions' => $attractions->count(),
        'reviews' => $reviews->count(),
        'published_reviews' => $publishedReviews->count(),
        'unpublished_reviews' => $unpublishedReviews->count(),
    ];
        return view('admin.pages.index', compact('counter'));
    })->name('index');

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('zones', ZoneController::class);
    Route::resource('attractions', AttractionController::class);

    // ✅ FIX DI SINI
    Route::patch('reviews/{id}/approve', [ReviewController::class, 'approve'])
        ->name('reviews.approve');

    Route::patch('reviews/{id}/unapprove', [ReviewController::class, 'unapprove'])
        ->name('reviews.unapprove');

    // (opsional tapi WAJIB kalau mau index jalan)
    Route::resource('reviews', ReviewController::class);
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
