<div>   
    <div class="w-11/12 md:w-4/5 mx-auto p-4 md:p-6 lg:p-12">
        {{-- Page's title and search bar --}}
        <div class="mb-3 flex flex-col md:flex-row justify-center items-start">
            <h1 class="text-left font-bold text-5xl mb-5 md:w-3/4"><span class="border-dashed border-b-4 border-gray-900">All posts</span></h1>
            <x-jet-input wire:model="search" type="search" placeholder="Search posts by category, title, or name" class="mt-5 w-full" />
        </div>
        @forelse ($posts as $post)
            {{-- user's posts --}}
            <div class="flex flex-col md:flex-row justify-center items-start mb-3 rounded-lg shadow-md bg-gray-50">
                <div class="px-4 my-5 w-full md:w-2/5 text-gray-500">
                    <p class="font-ibm text-sm">{{ \Carbon\Carbon::parse ($post->created_at)->format('F d, Y') }}</p>
                </div>
                <div class="px-4 my-5 w-full text-gray-500 md:w-3/5 flex flex-col space-y-5">
                    <div class="flex flex-col space-y-5">
                        <p class="text-sm">{{ $post->category }}</p>
                        <a href="{{ route('posts.show', $post->slug) }}" class="text-xl text-gray-900 hover:text-cyan-500 font-bold hover:underline">
                        {{ $post->title }}
                        </a>
                    </div>
                    <div class="overflow-ellipsis overflow-hidden max-h-24">
                        <p class="text-sm text-gray-700">{!!$post->body!!}</p>
                    </div>
                    <a href="{{ route('user.show', $post->username) }}" class="hover:underline hover:text-cyan-500">
                        Posted by {{ $post->name }}
                    </a>
                </div>
            </div>
        @empty
            <div class="flex flex-col justify-center items-center p-12 space-x-5">
                <img src="{{ asset('img/svg/no_data.svg') }}" alt="A girl with a magnifying glass..." class="h-4/5 w-4/5 md:h-2/5 md:w-2/5 block md:mr-3 mb-5">
                <div>
                    <h6 class="font-bold">No posts had been published.</h6>
                </div>
            </div>
        @endforelse
    </div>
    {{-- For pagination --}}
    <div class="w-11/12 md:w-4/5 mx-auto p-4 md:p-8 lg:p-12">
        @if (!empty($posts))
            {{ $posts->links() }}
        @endif
    </div>
</div>
