<?php

namespace App\Http\Controllers\User;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StorePostRequest;

class PostController extends Controller
{

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
            'slug' => Str::of($request->input('title'))->slug('-'),
            'body' => $request->input('body'),
        ]);

        $request->session()->flash('flash.banner', 'Your post has been published');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect('/posts');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $post = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->where('posts.id', '=', $post->id)
            ->first();

        return view('pages.posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'category' => ['required'],
            'title' => ['required', 'string', 'min:5', Rule::unique('posts')->ignore($post->id)],
            'body' => ['required', 'string', 'min:50'],
        ]);

        if (!Gate::allows('update-post', $post)) {
            abort(403);
        } else {
            $post = Post::find($post->id);
            $post->user_id = Auth::id();
            $post->category = $request->input('category');
            $post->title = $request->input('title');
            $post->slug = Str::of($request->input('title'))->slug('-');
            $post->body = $request->input('body');
            $post->save();

            $request->session()->flash('flash.banner', 'Your post has been updated');
            $request->session()->flash('flash.bannerStyle', 'success');

            return redirect('/user/dashboard');
        }
    }
}
