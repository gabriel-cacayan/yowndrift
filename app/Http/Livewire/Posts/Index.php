<?php

namespace App\Http\Livewire\Posts;

use Livewire\Component;
use Illuminate\Support\Str;
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
                ->where('posts.category', 'like', '%' . Str::of($this->search)->title() . '%')
                ->orWhere('posts.title', 'like', '%' . $this->search . '%')
                ->orWhere('users.name', 'like', '%' . Str::of($this->search)->title() . '%')
                ->orderBy('posts.created_at', 'desc')
                ->simplePaginate(10),
        ]);
    }
}
