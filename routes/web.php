<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PageContentController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\TestimonialController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/en', [HomeController::class, 'english'])->name('home.en');
Route::get('/de', [HomeController::class, 'german'])->name('home.de');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Admin routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Page Content Management
    Route::resource('page-contents', PageContentController::class);

    // Services Management
    Route::resource('services', ServiceController::class);

    // Testimonials Management
    Route::resource('testimonials', TestimonialController::class);
});

require __DIR__.'/auth.php';
