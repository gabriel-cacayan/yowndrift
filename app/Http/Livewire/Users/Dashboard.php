<?php

namespace App\Http\Livewire\Users;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{

    public $sortBy = 'created_at';
    public $sortDirection = 'asc';


    public function sortBy($field)
    {
        $this->sortDirection = $this->sortBy === $field
            ? $this->reverseSort()
            : 'asc';

        $this->sortBy = $field;
    }

    public function reverseSort()
    {
        return $this->sortDirection === 'asc'
            ? 'desc'
            : 'asc';
    }

    public function deletePost(Request $request, $post_id)
    {
        $post = Post::find($post_id);
        $post->delete();

        $request->session()->flash('flash.banner', 'Your post has been deleted');
        $request->session()->flash('flash.bannerStyle', 'danger');
    }

    public function render()
    {
        return view('livewire.users.dashboard', [
            'posts' => DB::table('users')
                ->join('posts', 'users.id', '=', 'posts.user_id')
                ->where('users.id', 'like', '%' . Auth::id() . '%')
                ->orderBy('posts.' . $this->sortBy, $this->sortDirection)
                ->get(),
        ]);
    }
}
