<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\User;
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
            ->paginate(5);

        return view('pages.post.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        // $post = new Post;
        // $post->user_id = Auth::id();
        // $post->category = strtolower($request->input('category'));
        // $post->title = $request->input('title');
        // $post->body = $request->input('body');
        // $post->created_at = now();
        // $post->updated_at = now();
        // $post->save();

        Post::create([
            'user_id' => Auth::id(),
            'category' => strtolower($request->input('category')),
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $request->session()->flash('flash.banner', 'Your post has been published');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect("/post");
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
        return view('pages.post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
