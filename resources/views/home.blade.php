<x-app-layout>

   {{-- Landing page's content --}}
   <div class="bg-gray-50 py-6 sm:py-4 flex flex-col sm:flex-row justify-center items-center">
        <img src="{{ asset('img/svg/landing-page-picture.svg') }}" alt="A girl writing something into a laptop" class="block h-1/2 w-1/2" >
        <div class="text-center sm:text-left px-6 sm:px-12">
           <h1 class="font-bold text-4xl md:text-5xl lg:text-6xl my-5">Built for <span class="text-cyan-500">Bloggers</span></h1>
           <p class="text-gray-700">Read interesting topics and share your ideas to everyone.</p>
           @auth
               <a href="{{ route('posts.create') }}" class="block w-full sm:w-auto sm:inline-flex items-center mt-5 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-gray-50 uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Get started</a>    
           @endauth
           @guest
               <a href="{{ route('login') }}" class="block w-full sm:w-auto sm:inline-flex items-center mt-5 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-gray-50 uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Get started</a>
           @endguest
        </div>
   </div>
   
   {{-- Showing 5 latest posts --}}
   <div class="w-11/12 md:w-4/5 my-5 mx-auto p-4 md:p-6 lg:p-12">
      <h1 class="text-left font-bold text-4xl sm:text-5xl mb-5 md:w-3/4">Latest posts</h1>
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
                        <a href="{{ route('user.show', $post->user->username) }}" class="hover:underline hover:text-cyan-500">
                          Posted by {{ $post->user->name }}
                        </a>
                    </div>
                </div>
            @empty
          <div class="flex flex-col justify-center items-center p-12 space-x-5">
               <img src="{{ asset('img/svg/no_data.svg') }}" alt="Paper with no text" class="h-4/5 w-4/5 md:h-2/5 md:w-2/5 block md:mr-3 mb-5">
               <div>
                   <h6 class="font-bold">No posts had been published.</h6>
               </div>
          </div>
       @endforelse
        <div class="flex justify-center items-center">
            <a href="{{ route('posts.index') }}" class="text-center sm:w-auto flex flex-row justify-center items-center mt-5 px-4 py-2 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-blue-50 uppercase tracking-widest hover:bg-blue-500 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring focus:ring-blue-300 disabled:opacity-25 transition">Find more posts
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5 text-blue-50 ml-2">
                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </a>
        </div>
   </div>
</x-app-layout>