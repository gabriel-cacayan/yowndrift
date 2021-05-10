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

    public $search;

    public function mount()
    {
        $this->search = '';
        $this->posts = [];
    }

    public function updatedSearch()
    {
        $this->posts = Post::where('category', 'like', '%' . $this->search . '%')
            ->get();
    }
    public function render()
    {
        return view('livewire.blog.index');
    }
}
