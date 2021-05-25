<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;
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

        $this->comments = Post::find($this->post_id)->comments()
            ->orderBy('comments.created_at', 'desc')
            ->get();
            
        $this->body = ''; 
    }

    public function mount($post_id)
    {
        $this->comments = Post::find($post_id)->comments()
            ->orderBy('comments.created_at', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.posts.post-comment');
    }
}
