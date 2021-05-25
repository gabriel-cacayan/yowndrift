<div class="p-8 md:p-12">
        <x-jet-input 
        class="relative w-full mt-1" 
        type="text" 
        placeholder="Title or name"
        wire:model="search" 
        wire:keydown.escape="resetSearch"
        />
        {{-- svg close --}}
        <svg xmlns="http://www.w3.org/2000/svg" class="rounded-md bg-red-500 text-gray-50 absolute top-2 md:top-4 right-2 md:right-4 z-50 cursor-pointer h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="search-close">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
         {{-- svg search --}}
         <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-12 md:top-16 right-10 md:right-14 h-5 w-5 text-cyan-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        {{-- Search content --}}
        <div class="px-8 md:px-12 absolute top-18 left-0 z-40 bg-gray-50 w-full rounded-b-md">
           <div class="max-h-96 overflow-auto divide-y divide-gray-200">
             @if (!empty($search))
                @forelse ($posts as $post)
                    <a href="{{ route('posts.show', $post->id) }}" class="flex flex-col list-item list-none py-2 hover:bg-gray-100">
                        <p class="mb-2 text-cyan-500">{{ $post->title }}</p>
                        <p class="text-md text-gray-600 flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                          </svg>{{ $post->name }}</p>
                    </a>
                @empty
                    <a class="list-item list-none px-5 py-2">No results found</a>
                @endforelse    
            @endif
           </div>
        </div>
</div>
