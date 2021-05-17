<x-app-layout>
   {{-- Landing page's content --}}
   <div class="bg-gray-50 py-6 sm:py-0 flex flex-row justify-center items-center">
        <img src="{{ asset('img/svg/landing-page-picture.svg') }}" class="hidden sm:block h-1/2 w-1/2" alt="Landing page's picture">
        <div class="text-center sm:text-left px-12">
           <h1 class="font-bold text-4xl sm:text-6xl mb-5">Built for <span class="text-cyan-500">Bloggers</span></h1>
           <p class="text-gray-700">Yowndrift is a blogging web application, where anyone can share their ideas or knowledge on a specific topic.</p>
           <x-jet-button class="mt-5">Get started</x-jet-button>
        </div>
   </div>
</x-app-layout>