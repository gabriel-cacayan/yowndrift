<x-app-layout>
   {{-- Landing page's content --}}
   <div class="bg-gray-50 py-6 sm:py-0 flex flex-row justify-center items-center">
        <img src="{{ asset('img/svg/landing-page-picture.svg') }}" class="hidden sm:block h-1/2 w-1/2" alt="Landing page's picture">
        <div class="text-center sm:text-left px-12">
           <h1 class="font-bold text-4xl sm:text-6xl mb-5">Built for <span class="text-cyan-500">Bloggers</span></h1>
           <p class="text-gray-700">Yowndrift is a blog web application, where anyone can share their ideas or knowledge on a specific topic.</p>
           @auth
               <a href="{{ route('posts.create') }}" class="block w-full sm:w-auto sm:inline-flex items-center mt-5 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-gray-50 uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Get started</a>    
           @endauth
           @guest
               <a href="{{ route('login') }}" class="block w-full sm:w-auto sm:inline-flex items-center mt-5 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-gray-50 uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Get started</a>
           @endguest
        </div>
   </div>
   {{-- Showing 5 latest posts --}}
   <div class="w-11/12 sm:w-4/5 my-5 mx-auto p-4 sm:p-6 lg:p-12">
      <h1 class="text-left font-bold text-4xl sm:text-6xl mb-5 md:w-3/4"><span class="border-dashed border-b-4 border-gray-900">Latest posts</span></h1>
       @forelse ($posts as $post)
           <div class="flex flex-col md:flex-row justify-center items-start mb-3 rounded-lg shadow-md bg-gray-50">
               <div class="px-4 my-5 w-full md:w-3/4 text-gray-500">
                   <p class="font-ibm text-sm">Published on {{ \Carbon\Carbon::parse ($post->created_at)->format('F d, Y') }}</p>
               </div>
               <div class="px-4 my-5 w-full text-gray-500 md:w-3/5 flex flex-col space-y-5">
                   <div class="flex flex-col space-y-5">
                       <p class="text-sm">{{ $post->category }}</p>
                       <a href="/posts/{{ $post->id }}" class="text-xl text-gray-900 hover:text-cyan-500 font-bold hover:underline">
                       {{ $post->title }}
                       </a>
                   </div>
                   <div class="truncate max-h-24">
                       <p class="text-sm">{!!$post->body!!}</p>
                   </div>
                   <a href="/users/{{ $post->user_id }}" class="hover:underline hover:text-cyan-500">
                     Posted by {{ $post->name }}
                   </a>
               </div>
           </div>
       @empty
          <div class="flex flex-col sm:flex-row justify-center items-center p-12 space-x-5">
               <img src="{{ asset('img/svg/typewritter.svg') }}" class="h-4/5 w-4/5 sm:h-2/5 sm:w-2/5 block sm:mr-3" alt="Girl typing">
               <div>
                   <h1 class="font-bold mt-5 sm:mt-0 text-lg sm:text-4xl">No posts had been published.</h1>
               </div>
          </div>
       @endforelse
         <a href="{{ route('posts.index') }}" class="text-center block w-full sm:w-auto sm:inline-flex items-center mt-5 px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-gray-50 uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Find more posts</a>
   </div>
</x-app-layout>