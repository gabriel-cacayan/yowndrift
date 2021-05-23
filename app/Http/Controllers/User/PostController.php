<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
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
        return view('pages.posts.index');
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
        $request->validated();

        // Execution doesn't reach here if validation fails.

        Post::create([
            'user_id' => Auth::id(),
            'category' => $request->input('category'),
            'title' => $request->input('title'),
            'body' => $request->input('body'),
        ]);

        $request->session()->flash('flash.banner', 'Your post has been published');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.posts.show', [
            'id' => $id,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('pages.posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, $id)
    {
        $request->validated();

        $post = Post::find($id);
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
    public function destroy($id)
    {
        //
    }
}
