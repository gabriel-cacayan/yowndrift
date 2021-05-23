<?php

namespace App\Http\Livewire\Posts;

use App\Models\Comment;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostComment extends Component
{
    public $comments;
    public $post_id;
    public $body;

    protected $rules = [
        'body' => ['required', 'max:500'],
    ];

    public function createComment()
    {
        $this->validate();


        Comment::create([
            'user_id' => Auth::id(),
            'post_id' => $this->post_id,
            'body' => $this->body,
        ]);

        $this->comments = DB::table('users')
            ->join('comments', 'users.id', '=', 'comments.user_id')
            ->where('post_id', '=', $this->post_id)
            ->orderBy('comments.created_at', 'desc')
            ->get();
    }

    public function mount($post_id)
    {
        $this->comments = DB::table('users')
            ->join('comments', 'users.id', '=', 'comments.user_id')
            ->where('post_id', '=', $post_id)
            ->orderBy('comments.created_at', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.posts.post-comment');
    }
}
