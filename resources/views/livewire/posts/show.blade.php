<div>
    <div class="bg-gray-50">
        <div class="w-full md:w-4/5 lg:w-3/5 mx-auto p-4 md:p-6 lg:p-12">
            {{-- Default picures for each category --}}
            <div class="flex flex-col justify-center items-start space-y-5">
                @if($post->category == 'Technology')
                    <img src="{{ asset('img/svg/technology.svg') }}" alt="Technology's default picture" class="h-full w-full mx-auto block bg-gray-50">
                @elseif($post->category == 'Science')
                    <img src="{{ asset('img/svg/science.svg') }}" alt="Science's default picture" class="h-full w-full mx-auto block bg-gray-50">
                @elseif($post->category == 'Health')
                    <img src="{{ asset('img/svg/health.svg') }}" alt="Health's default picture" class="h-full w-full mx-auto block bg-gray-50">
                @else    
                    <img src="{{ asset('img/svg/society.svg') }}" alt="Society's default picture" class="h-full w-full mx-auto block bg-gray-50">
                @endif
                <p class="font-ibm text-sm text-gray-600">Published on {{ \Carbon\Carbon::parse ($post->created_at)->format('F d, Y') }} by <a href="{{ route('user.show', $post->username) }}" class="hover:underline">{{ $post->name }}</a></p>
                <p>{{ $post->category }}</p>
                <h1 class="font-bold text-3xl sm:text-4xl">{{ $post->title }}</h1>
                <p class="text-gray-700">{!!$post->body!!}</p>
            </div>
        </div>
        {{-- Nested livewire for comment feature --}}
        @livewire('posts.post-comment', ['post' => $post], , key($post->id))
    </div>
</div>
