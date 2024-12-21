<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Redirected to home page for everyone
Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Redirected to blogs page for everyone
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blog', [BlogController::class, 'show'])->name('blog.show');

// Redirect to contact-us page for everyone
Route::get('/contact', [PageController::class, 'contactPage'])->name('contact');

// Redirected to term & condition page for everyone
Route::get('/terms', [PageController::class, 'termsPage'])->name('terms');

// Redirected to privacy & policy page for everyone
Route::get('/policy', [PageController::class, 'policyPage'])->name('policy');


Auth::routes();

Route::middleware(['auth'])->group(function () {
    route::get('/create', [BlogController::class, 'create'])->name('blog.create');
    route::post('/store', [BlogController::class, 'store'])->name('blog.store');

    Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
});

