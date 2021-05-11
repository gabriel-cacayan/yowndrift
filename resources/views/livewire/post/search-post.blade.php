<div class="ml-10 mt-5">
        <x-jet-input 

        class="relative w-full" 
        type="text" 
        placeholder="Title, Author, Category"
        wire:model="search" 
        wire:keydown.escape="resetSearch"
        />
        <div class="absolute z-10 list-group bg-white rounded-t-none shadow-lg">
            @if (!empty($search))
                {{-- <div class="fixed inset-0" wire:click="resetSearch"></div> --}}
                @forelse ($posts as $post)
                    <a href="/post/{{$post->post_id}}" class="flex flex-col list-item list-none px-5 py-2 hover:bg-gray-100">
                        <p class="text-sm text-gray-600">{{ $post->name }}</p>
                        <p class="font-bold">{{ $post->title }}</p>
                    </a>
                @empty
                    <a href="#" class="list-item list-none px-5 py-2 bg-gray-100">No results!</a>
                @endforelse    
            @endif
        </div>
</div>
