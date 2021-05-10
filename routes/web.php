<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\PostController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/post', [PostController::class, 'index'])->name('post.index');

Route::view('/dashboard', 'dashboard')->name('dashboard');


// 'verified', 'admin'
Route::middleware(['auth:sanctum'])->group(function () {

    // Admin
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/post', PostController::class)->except(['index']);
});
