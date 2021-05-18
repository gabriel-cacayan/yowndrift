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
                ->where('posts.category', 'LIKE', '%' . $this->search . '%')
                ->orWhere('posts.title', 'LIKE', '%' . $this->search . '%')
                ->orWhere('users.name', 'LIKE', '%' . $this->search . '%')
                ->orderBy('posts.created_at', 'desc')
                ->paginate(20),
        ]);
    }
}