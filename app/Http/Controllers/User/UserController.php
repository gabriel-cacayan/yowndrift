<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('pages.users.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        $posts = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->where('users.id', 'like', '%' . $id . '%')
            ->orderBy('posts.created_at', 'desc')
            ->get();

        return view('pages.users.show', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
