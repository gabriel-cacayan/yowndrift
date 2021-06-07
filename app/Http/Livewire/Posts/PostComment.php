<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use App\Models\Comment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class PostComment extends Component
{
    public $comments;
    public $body;
    public $post_id;

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
            ->get();

        $this->body = '';
    }

    public function mount($post)
    {
        $this->comments = Post::find($post->id)->comments()
            ->get();

        $this->post_id = $post->id;
    }

    public function render()
    {
        return view('livewire.posts.post-comment');
    }
}
