<?php

namespace App\Http\Livewire\Blog;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    // DB::table('users')
    //         ->join('posts', 'users.id', '=', 'posts.user_id')
    //         ->where('posts.category', 'like', '%' . $this->search . '%')
    //         // ->orWhere('posts.title', $this->search)
    //         ->get()

    public $posts;

    public $search = 'society';

    public function mount()
    {
        // $this->posts = Post::all();
        $this->posts = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->where('posts.category',  $this->search)
            // ->orWhere('posts.title', $this->search)
            ->get()->dd();
    }

    public function render()
    {
        return view('livewire.blog.index');
    }
}
