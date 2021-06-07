<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    use WithPagination;

    public $search;

    protected $queryString = ['search'];

    public function render()
    {
        return view('livewire.posts.index', [
            'posts' => DB::table('users')
                ->join('posts', 'users.id', '=', 'posts.user_id')
                ->where('posts.category', 'like', '%' . strtoupper(substr($this->search, 0, 1)) . strtolower(substr($this->search, 1)) . '%')
                ->orWhere('posts.title', 'like', '%' . strtoupper(substr($this->search, 0, 1)) . strtolower(substr($this->search, 1)) . '%')
                ->orWhere('users.name', 'like', '%' . strtoupper(substr($this->search, 0, 1)) . strtolower(substr($this->search, 1)) . '%')
                ->orderBy('posts.created_at', 'desc')
                ->simplePaginate(10),
        ]);
    }
}
