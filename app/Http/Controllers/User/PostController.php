<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->orderBy('posts.created_at', 'desc')
            ->paginate(10);

        return view('pages.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post_id)
    {
        $post = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->where('post_id', '=', $post_id)
            ->first();

        return view('pages.posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post_id)
    {
        $post = Post::find($post_id);

        return view('pages.posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, $post_id)
    {
        $validated = $request->validated();

        $post = Post::find($post_id);
        $post->user_id = Auth::id();
        $post->category = $request->input('category');
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        $request->session()->flash('flash.banner', 'Your post has been updated');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $post_id)
    {
        $post = Post::find($post_id);

        $post->delete();

        $request->session()->flash('flash.banner', 'Your post has been deleted');
        $request->session()->flash('flash.bannerStyle', 'danger');

        return redirect('/users');
    }
}
