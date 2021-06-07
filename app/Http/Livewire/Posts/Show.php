<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Show extends Component
{
    protected $post;

    public function mount(Post $post)
    {

        $this->post = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->where('posts.id', '=', $post->id)
            ->first();
    }

    public function render()
    {
        return view('livewire.posts.show', [
            'post' => $this->post
        ]);
    }
}
