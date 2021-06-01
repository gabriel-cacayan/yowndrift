<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\CommentController;
use App\Http\Controllers\User\SocialiteController;


// Facebook
Route::get('/login/facebook', [SocialiteController::class, 'facebook'])->name('login.facebook');

Route::get('/login/facebook/redirect', [SocialiteController::class, 'facebookRedirect']);

// Google
Route::get('/login/google', [SocialiteController::class, 'google'])->name('login.google');

Route::get('/login/google/redirect', [SocialiteController::class, 'googleRedirect']);

// Github
Route::get('/login/github', [SocialiteController::class, 'github'])->name('login.github');

Route::get('/login/github/redirect', [SocialiteController::class, 'githubRedirect']);


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum'])->group(function () {

    Route::resource('/users', UserController::class)->only('index');

    Route::resource('/posts', PostController::class)->except(['index', 'show']);

    Route::resource('/comments', CommentController::class);
});

Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
