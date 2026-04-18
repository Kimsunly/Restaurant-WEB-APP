<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\SlideController;
use Illuminate\Support\Facades\Route;

// ── PUBLIC ROUTES ──────────────────────────────
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/menu', [PublicController::class, 'menu'])->name('menu');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/book', [PublicController::class, 'book'])->name('book');

// ── ADMIN ROUTES (protected) ───────────────────
Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('menus', MenuController::class);
        Route::resource('slides', SlideController::class);
    });

// ── AUTH ROUTES (Breeze) ───────────────────────
require __DIR__.'/auth.php';
