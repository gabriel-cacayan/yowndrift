<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {

        $posts = Post::orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('home', ['posts' => $posts]);
    }
}
