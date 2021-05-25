<div>   
        <div class="w-11/12 sm:w-4/5 mx-auto p-4 sm:p-6 lg:p-12">
            {{-- Page's title and search bar --}}
           <div class="mb-3 flex flex-col md:flex-row justify-center items-start">
                <h1 class="text-left font-bold text-5xl mb-5 md:w-3/4"><span class="border-dashed border-b-4 border-gray-900">All posts</span></h1>
                <x-jet-input wire:model="search" type="search" placeholder="Search posts by category, title, or name" class="mt-5 w-full" />
           </div>
            @forelse ($posts as $post)
                {{-- user's posts --}}
                <div class="flex flex-col md:flex-row justify-center items-start mb-3 rounded-lg shadow-md bg-gray-50">
                    <div class="px-4 my-5 w-full md:w-3/4 text-gray-500">
                        <p class="font-ibm text-sm">Published on {{ \Carbon\Carbon::parse ($post->created_at)->format('F d, Y') }}</p>
                    </div>
                    <div class="px-4 my-5 w-full text-gray-500 md:w-3/5 flex flex-col space-y-5">
                        <div class="flex flex-col space-y-5">
                            <p class="text-sm">{{ $post->category }}</p>
                            <a href="{{ route('posts.show', $post->id) }}" class="text-xl text-gray-900 hover:text-cyan-500 font-bold hover:underline">
                            {{ $post->title }}
                            </a>
                        </div>
                        <div class="truncate max-h-24">
                            <p class="text-sm text-gray-700">{!!$post->body!!}</p>
                        </div>
                        <a href="{{ route('users.show', $post->user_id) }}" class="hover:underline hover:text-cyan-500">
                          Posted by {{ $post->name }}
                        </a>
                    </div>
                </div>
                {{-- This loop is to remove the margin for last div --}}
                {{-- @if ($loop->last)
                    <div class="flex flex-col md:flex-row justify-center items-start rounded-lg shadow-md bg-gray-50">
                        <div class="px-4 my-5 w-full md:w-3/4 text-gray-500">
                            <p class="font-ibm text-sm">Published on {{ \Carbon\Carbon::parse ($post->created_at)->format('F d, Y') }}</p>
                        </div>
                        <div class="px-4 my-5 w-full text-gray-500 md:w-3/5 flex flex-col space-y-5">
                            <div class="flex flex-col space-y-5">
                                <p class="text-sm">{{ $post->category }}</p>
                                <a href="{{ route('posts.show', $post->id) }}" class="text-xl text-gray-900 hover:text-cyan-500 font-bold hover:underline">
                                {{ $post->title }}
                                </a>
                            </div>
                            <div class="truncate max-h-24">
                                <p class="text-sm text-gray-700">{!!$post->body!!}</p>
                            </div>
                            <a href="{{ route('users.show', $post->user_id) }}" class="hover:underline hover:text-cyan-500">
                            Posted by {{ $post->name }}
                            </a>
                        </div>
                    </div>
                @endif --}}
            @empty
                {{-- This will show if there is no posts displayed --}}
                <div class="flex flex-col sm:flex-row justify-center items-center p-12 space-x-5">
                        <img src="{{ asset('img/svg/typewritter.svg') }}" class="h-4/5 w-4/5 sm:h-2/5 sm:w-2/5 block sm:mr-3" alt="A typewritter">
                        <div>
                            <h1 class="font-bold mt-5 sm:mt-0 text-lg sm:text-4xl">No posts had been published.</h1>
                        </div>
                </div>
            @endforelse
        </div>
        {{-- For pagination --}}
        <div class="w-11/12 sm:w-4/5 mx-auto p-4 sm:p-6 md:p-8 lg:p-12">
            @if (!empty($posts))
             {{ $posts->links() }}
            @endif
        </div>
</div>
