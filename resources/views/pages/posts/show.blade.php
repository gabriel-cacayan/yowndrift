<x-app-layout>
    <div class="bg-gray-100">
        <div class="w-11/12 sm:w-3/5 mx-auto p-4 sm:p-6 lg:p-12 bg-gray-50">
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

        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <textarea name="body" id="body" cols="30" rows="10"></textarea>
            <x-jet-button type="submit">Post</x-jet-button>
        </form>
    </div>
</x-app-layout>