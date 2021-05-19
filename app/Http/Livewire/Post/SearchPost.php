<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class SearchPost extends Component
{

    public $posts;

    public $search;

    public function mount()
    {
        $this->resetSearch();
    }

    public function resetSearch()
    {
        $this->search = '';
        $this->posts = [];
    }

    public function updatedSearch()
    {
        $this->posts = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->where('users.name', 'like', '%' . $this->search . '%')
            ->orWhere('posts.title', 'like', '%' . $this->search . '%')
            ->get();
    }

    public function render()
    {
        return view('livewire.post.search-post');
    }
}
