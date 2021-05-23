<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Show extends Component
{
    protected $post;

    public $post_id;

    public function mount($id)
    {
        $this->post_id = $id;

        $this->post = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->where('posts.id', '=', $id)
            ->first();
    }

    public function render()
    {
        return view('livewire.posts.show', [
            'post' => $this->post
        ]);
    }
}
