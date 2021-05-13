<div class="p-8 sm:p-12">
        <input 
        class="relative w-full mt-1 block px-1 border-0 border-b-2 border-gray-300 focus:ring-0 focus:border-cyan-500" 
        type="text" 
        placeholder="Title or Author"
        wire:model="search" 
        wire:keydown.escape="resetSearch"
        />
        {{-- svg close --}}
        <svg xmlns="http://www.w3.org/2000/svg" class="rounded-md bg-red-500 text-gray-50 absolute top-2 sm:top-4 right-2 sm:right-4 z-50 cursor-pointer h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="search-close">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
         {{-- svg search --}}
         <svg xmlns="http://www.w3.org/2000/svg" class="absolute top-12 sm:top-16 right-10 sm:right-14 h-5 w-5 text-cyan-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
        {{-- Search content --}}
        <div class="px-8 sm:px-12 absolute top-18 left-0 z-40 bg-gray-50 w-full rounded-b-md">
           <div class="max-h-96 overflow-auto divide-y divide-gray-200">
             @if (!empty($search))
                @forelse ($posts as $post)
                    <a href="/post/{{$post->post_id}}" class="flex flex-col list-item list-none px-5 py-2 hover:bg-gray-100">
                        <p class="font-bold">{{ $post->title }}</p>
                        <p class="text-sm text-gray-600">{{ $post->name }}</p>
                    </a>
                @empty
                    <a class="list-item list-none px-5 py-2">No results found</a>
                @endforelse    
            @endif
           </div>
        </div>
</div>
