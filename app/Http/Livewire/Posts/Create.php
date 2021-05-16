<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public $category;
    public $title;
    public $body;

    protected function rules()
    {
        return [
            'category' => ['required', 'in:Technology,Science,Health,Society'],
            'title' => ['required', 'string', 'min:5'],
            'body' => ['required', 'string', 'min:50'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    
    public function createPost(Request $request)
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

        $request->session()->flash('flash.banner', 'Your post has been published');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect()->to('/posts');
    }

    public function render()
    {
        return view('livewire.posts.create');
    }
}
