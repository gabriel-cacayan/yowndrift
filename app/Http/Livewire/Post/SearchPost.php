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
        // dd(strtoupper(substr($this->search, 0, 1)) . strtolower(substr($this->search, 1)));

        $this->posts = DB::table('users')
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->where('users.name', 'like', '%' . strtoupper(substr($this->search, 0, 1)) . strtolower(substr($this->search, 1)) . '%')
            ->orWhere('posts.title', 'like', '%' . $this->search . '%')
            ->get();
    }

    public function render()
    {
        return view('livewire.post.search-post');
    }
}
