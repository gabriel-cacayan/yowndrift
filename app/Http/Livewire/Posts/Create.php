<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public $confirmingUserPost = false;
    public $category;
    public $title;
    public $body;

    public function openModal()
    {
        $this->confirmingUserPost = true;
    }

    protected function rules()
    {
        return [
            'category' => ['required', 'in:Technology,Science,Health,Society'],
            'title' => ['required', 'string', 'min:10'],
            'body' => ['required', 'string', 'min:50'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // public function dehydrate()
    // {
    //     $this->emit('initializeCkEditor');
    // }

    public function createPost()
    {
        $this->validate();

        // Execution doesn't reach here if validation fails.

        Post::create([
            'user_id' => Auth::id(),
            'category' => $this->category,
            'title' => $this->title,
            'body' => $this->body,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        session()->flash('flash.banner', 'Your post has been published');
        session()->flash('flash.bannerStyle', 'success');

        return redirect('/posts');
    }

    public function render()
    {
        return view('livewire.posts.create');
    }
}
