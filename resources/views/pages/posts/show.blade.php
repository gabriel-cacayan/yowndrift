<x-app-layout>
    <div class="bg-gray-100">
        <div class="w-11/12 sm:w-3/5 my-5 mx-auto p-4 sm:p-6 lg:p-12 bg-gray-50 shadow-md rounded-lg">
            <div class="flex flex-col justify-center items-start space-y-5">
                @if($post->category == 'Technology')
                    <img src="{{ asset('img/svg/technology.svg') }}" class="h-full w-full mx-auto block bg-gray-900" alt="Technology's default picture">
                @elseif($post->category == 'Science')
                    <img src="{{ asset('img/svg/science.svg') }}" class="h-full w-full mx-auto block bg-gray-900" alt="Science's default picture">
                @elseif($post->category == 'Health')
                    <img src="{{ asset('img/svg/health.svg') }}" class="h-full w-full mx-auto block bg-gray-900" alt="Health's default picture">
                @else    
                    <img src="{{ asset('img/svg/society.svg') }}" class="h-full w-full mx-auto block bg-gray-900" alt="Society's default picture">
                @endif
                <p class="font-ibm text-sm text-gray-600">Published on {{ \Carbon\Carbon::parse ($post->created_at)->format('F d, Y') }} by <a href="/users/{{ $post->id }}" class="hover:underline">{{ $post->name }}</a></p>
                <p>{{ $post->category }}</p>
                <h1 class="font-bold">{{ $post->title }}</h1>
                 <p>{!!$post->body!!}</p>
            </div>
        </div>
        <h3 class="w-11/12 sm:w-3/5 mx-auto py-4 sm:py-6">Comments</h3>
        @foreach ($comments as $comment)
            <div class="w-11/12 sm:w-3/5 mx-auto mb-3 p-4 sm:p-6 bg-gray-50 shadow-md rounded-lg border-l-8 border-cyan-500">
                <p class="text-cyan-500 mb-3">{{ $comment->name }} <span class="ml-3 text-gray-700">Posted {{ Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span></p>
                <p>{!! $comment->body !!}</p>
            </div>
        @endforeach
        <div class="w-11/12 sm:w-3/5 my-3 mx-auto p-4 sm:p-6">
            <form action="{{ route('comments.store') }}" method="POST">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <textarea name="body" id="body" cols="30" rows="10"></textarea>
                <x-jet-input-error for="body" class="mt-2" />
                <div class="flex items-center justify-end mt-4 space-x-4">
                    <x-jet-button class="bg-green-700 hover:bg-green-500 active:bg-green-700 focus:border-green-700 focus:ring-green-300" type="submit">
                        {{ __('Post') }}
                    </x-jet-button> 
                </div>
            </form>
        </div>
    </div>
</x-app-layout>