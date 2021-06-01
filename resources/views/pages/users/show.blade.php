<x-app-layout>
      <div class="w-11/12 md:w-4/5 mx-auto p-4 md:p-6 lg:p-12">
         <h6 class="text-left font-bold">Posts by</h6>
         <h1 class="text-left font-bold text-4xl my-3 md:w-3/4 text-cyan-500">{{ $user->name }}</h1>
         <p class="mt-3 mb-12 text-sm">{{ $user->bio }}</p>
          @foreach ($posts as $post)
              {{-- user's posts --}}
              <div class="flex flex-col md:flex-row justify-center items-start mb-3 rounded-lg shadow-md bg-gray-50">
                <div class="px-4 my-5 w-full md:w-2/5 text-gray-500">
                    <p class="font-ibm text-sm">{{ \Carbon\Carbon::parse ($post->created_at)->format('F d, Y') }}</p>
                </div>
                <div class="px-4 my-5 w-full text-gray-500 md:w-3/5 flex flex-col space-y-5">
                    <div class="flex flex-col space-y-5">
                        <p class="text-sm">{{ $post->category }}</p>
                        <a href="{{ route('posts.show', $post->id) }}" class="text-xl text-gray-900 hover:text-cyan-500 font-bold hover:underline">
                        {{ $post->title }}
                        </a>
                    </div>
                    <div class="overflow-ellipsis overflow-hidden max-h-24">
                        <p class="text-sm text-gray-700">{!!$post->body!!}</p>
                    </div>
                    <a href="{{ route('users.show', $post->user_id) }}" class="hover:underline hover:text-cyan-500">
                      Posted by {{ $post->name }}
                    </a>
                </div>
            </div>
          @endforeach
      </div>
</x-app-layout>