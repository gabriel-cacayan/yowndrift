<x-guest-user-layout>

    <div class="w-11/12 sm:w-4/5 mx-auto p-4 sm:p-6 lg:p-12">
        <h1 class="text-left font-bold text-5xl mb-5"><span class="border-dashed border-b-4 border-gray-900">All posts</span></h1>
        @forelse ($posts as $post)
            <div class="flex flex-col md:flex-row justify-center items-start border-b border-gray-300">
                <div class="my-5 w-full md:w-3/4">
                    <p class="font-ibm text-sm">Published on {{ \Carbon\Carbon::parse ($post->created_at)->format('F d, Y') }}</p>
                </div>
                <div class="my-5 w-full text-gray-600 md:w-3/5 flex flex-col space-y-5">
                    <div class="flex flex-col space-y-5">
                        <p class="text-sm">{{ $post->category }}</p>
                        <a href="/post/{{ $post->post_id }}" class="text-xl text-gray-900 hover:text-cyan-500 font-bold hover:underline">
                        {{ $post->title }}
                        </a>
                    </div>
                    <div class="truncate max-h-24">
                        <p class="text-sm">{!!$post->body!!}</p>
                    </div>
                    <a href="#" class="hover:underline hover:text-cyan-500">
                      Author: {{ $post->name }}
                    </a>
                </div>
            </div>
        @empty
           <div class="flex flex-col sm:flex-row justify-center items-center p-12 space-x-5">
                <img src="{{ asset('img/svg/typewritter.svg') }}" class="h-4/5 w-4/5 sm:h-2/5 sm:w-2/5 block sm:mr-3" alt="Girl typing">
                <div>
                    <h1 class="font-bold mt-5 sm:mt-0 text-3xl sm:text-5xl">No posts has been published.</h1>
                </div>
           </div>
        @endforelse
    </div>
    <div class="w-11/12 sm:w-4/5 mx-auto p-4 sm:p-6 md:p-8 lg:p-12">
        @if (!empty($posts))
         {{ $posts->links() }}
        @endif
    </div>
</x-guest-user-layout>