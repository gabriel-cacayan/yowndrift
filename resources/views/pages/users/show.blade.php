<x-app-layout>
      <div class="w-11/12 md:w-4/5 mx-auto p-4 md:p-6 lg:p-12">
         <div class="p-0 md:p-5 mb-5 flex flex-col md:flex-row justify-start items-center">
            <div class="w-full mb-3">
                <h6 class="text-left font-bold">Posts by</h6>
                <h1 class="text-left font-bold text-4xl mt-3 text-cyan-500">{{ $user->name }}</h1>
            </div>
            <div class="bg-gray-100 p-5 w-full">
                <h6>{{ $user->name }}</h6>
                <h6 class="text-gray-500 mb-5">@<span>{{ $user->username }}</span></h6>
                <p class="mt-3 mb-12 text-sm">{{ $user->bio }}</p>
            </div>
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
            <div class="flex flex-col justify-center items-center p-4 md:p-6 mb-3">
                <img src="{{ asset('img/svg/dreamer.svg') }}" alt="A girl sitting on her dream" class="block h-full w-full md:h-1/2 md:w-1/2 mx-auto mb-5">
                <h6 class="font-bold">No Posts Yet</h6>
            </div>    
          @endforelse
      </div>
</x-app-layout>