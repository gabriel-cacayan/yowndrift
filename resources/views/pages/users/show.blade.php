<x-app-layout>
      <div class="w-11/12 sm:w-4/5 mx-auto p-4 sm:p-6 lg:p-12">
         <h6 class="text-left font-bold">Posts by</h6>
         <h1 class="text-left font-bold text-4xl my-3 md:w-3/4 text-cyan-500">{{ $user->name }}</h1>
         <p class="mt-3 mb-12 text-sm">{{ $user->bio }}</p>
          @foreach ($posts as $post)
              <div class="mb-3 flex flex-col md:flex-row justify-center items-start rounded-lg shadow-md bg-gray-50">
                  <div class="px-4 my-5 w-full md:w-3/4">
                      <p class="font-ibm text-sm">Published on {{ \Carbon\Carbon::parse ($post->created_at)->format('F d, Y') }}</p>
                  </div>
                  <div class="px-4 my-5 w-full text-gray-600 md:w-3/5 flex flex-col space-y-5">
                      <div class="flex flex-col space-y-5">
                          <p class="text-sm">{{ $post->category }}</p>
                          <a href="/posts/{{ $post->id }}" class="text-xl text-gray-900 hover:text-cyan-500 font-bold hover:underline">
                          {{ $post->title }}
                          </a>
                      </div>
                      <div class="truncate max-h-24">
                          <p class="text-sm">{!!$post->body!!}</p>
                      </div>
                  </div>
              </div>
          @endforeach
      </div>
</x-app-layout>