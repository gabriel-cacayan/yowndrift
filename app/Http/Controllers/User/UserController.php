<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function show(User $user)
    {
        $user = User::find($user->id);

        $posts = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->where('users.id', 'like', '%' . $user->id . '%')
            ->orderBy('posts.created_at', 'desc')
            ->get();

        return view('pages.users.show', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
