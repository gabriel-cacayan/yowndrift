<?php

use App\Http\Livewire\Posts\Show;
use App\Http\Livewire\Posts\Index;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Users\Dashboard;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\UserController;
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

    Route::get('/user/dashboard', Dashboard::class)->name('user.dashboard');

    Route::resource('/posts', PostController::class)->except(['index', 'show']);
});

Route::get('/user/{user:username}', [UserController::class, 'show'])->name('user.show');

Route::get('/posts', Index::class)->name('posts.index');

Route::get('/posts/{post:slug}', Show::class)->name('posts.show');
