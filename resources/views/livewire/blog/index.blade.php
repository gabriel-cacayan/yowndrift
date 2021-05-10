<div>
   
   
        <input class="mx-auto" wire:model="search" type="text" placeholder="Search users..."/>

    
    <div class="w-11/12 sm:w-4/5 mx-auto p-4 sm:p-6 md:p-8 lg:p-12">
        <h1 class="text-left font-bold text-5xl">All posts</h1>
        @forelse ($posts as $post)
            <div class="p-5 flex flex-col md:flex-row justify-center items-start border-b border-gray-300">
                <div class="w-full md:w-3/4">
                    <h1>Published on {{ \Carbon\Carbon::parse ($post->created_at)->format('F d, Y') }}</h1>
                </div>
                <div class="w-full md:w-3/5 space-y-5">
                    <p class="text-sm text-gray-700">{{ $post->category }}</p>
                    <br>
                    <a href="#" class="text-xl font-bold hover:underline">
                       {{ $post->title }}
                    </a>
                    <div class="truncate">
                        <p class="text-sm text-gray-700">{!!$post->body!!}</p>
                    </div>
                    <br>
                    <a href="#" class="font-bold hover:underline">
                      Author: {{ $post->name }}
                    </a>
                </div>
            </div>
        @empty
           <div class="flex flex-row justify-center items-center p-12 space-x-5">
                <img src="{{ asset('img/svg/typewritter.svg') }}" class="h-2/5 w-2/5 block mr-3" alt="">
                <div>
                    <h1 class="font-bold text-5xl">No posts has been published.</h1>
                </div>
           </div>
        @endforelse
    </div>
</div>
