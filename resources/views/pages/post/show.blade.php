<x-guest-user-layout>
    <div class="w-11/12 sm:w-4/5 mx-auto p-4 sm:p-6 lg:p-12">
        <div class="flex flex-col justify-center items-start space-y-5">
            <p class="font-ibm text-sm text-gray-600">Published on {{ \Carbon\Carbon::parse ($post->created_at)->format('F d, Y') }}</p>
            <p>{{ $post->category }}</p>
            <h1 class="text-3xl md:text-5xl font-bold">{{ $post->title }}</h1>
            <a href="#" class="hover:underline">{{ $post->name }}</a>
            <p>{!! $post->body !!}</p>
        </div>
    </div>
</x-guest-user-layout>