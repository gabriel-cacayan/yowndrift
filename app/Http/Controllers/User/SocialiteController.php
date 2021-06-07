<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    // public function facebook()
    // {
    //     return Socialite::driver('facebook')->redirect();
    // }

    // public function facebookRedirect(Request $request)
    // {
    //     if (!$request->has('code') || $request->has('denied')) {
    //         return redirect('/');
    //     }

    //     $user = Socialite::driver('facebook')->user();

    //     $user = User::firstOrCreate([
    //         'email' => $user->email,
    //     ], [
    //         'name' => $user->getName(),
    //         'email' =>  $user->getEmail(),
    //         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
    //     ]);

    //     Auth::login($user);

    //     return redirect('/');
    // }

    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleRedirect(Request $request)
    {
        if (!$request->has('code') || $request->has('denied')) {
            return redirect('/');
        }

        $user = Socialite::driver('google')->user();

        $user = User::firstOrCreate([
            'email' => $user->email,
        ], [
            'name' => $user->getName(),
            'username' => Str::of($user->getName())->slug('-'),
            'email' =>  $user->getEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        Auth::login($user);

        return redirect('/');
    }

    public function github()
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubRedirect(Request $request)
    {
        if (!$request->has('code') || $request->has('denied')) {
            return redirect('/');
        }

        $user = Socialite::driver('github')->user();


        $user = User::firstOrCreate([
            'email' => $user->email,
        ], [
            'name' => $user->getName(),
            'username' => $user->getNickname(),
            'email' =>  $user->getEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        Auth::login($user);

        return redirect('/');
    }
}
