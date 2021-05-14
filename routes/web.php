<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\DashboardController;




Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::view('/dashboard', 'dashboard')->name('dashboard');


// 'verified', 'admin'
Route::middleware(['auth:sanctum'])->group(function () {

    // For admin
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/posts', PostController::class)->except(['index', 'show']);
    Route::resource('/user/dashboard', DashboardController::class)->only(['index', 'update', 'destroy']);
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post_id}', [PostController::class, 'show'])->name('posts.show');
