<div>
    <div class="bg-gray-100">
        <h3 class="w-11/12 md:w-4/5 lg:w-3/5 mx-auto py-4 md:py-6">Comments</h3>
        {{-- Display all the comments related to this post --}}
        @forelse ($comments as $comment)
            <div class="w-11/12 md:w-4/5 lg:w-3/5 mx-auto mb-3 p-4 md:p-6 bg-gray-50 shadow-md rounded-lg">
                <p class="text-cyan-700 mb-3 text-md">{{ optional($comment)->user->name }} <span class="ml-3 text-gray-700 text-sm">Posted {{ Carbon\Carbon::parse(optional($comment)->created_at)->diffForHumans() }}</span></p>
                <p>{!! optional($comment)->body !!}</p>
            </div>
        @empty
             <div class="w-11/12 md:w-4/5 lg:w-3/5 mx-auto mb-3 p-4 md:p-6 bg-gray-50 shadow-md rounded-lg flex flex-col justify-center items-center">
                <img src="{{ asset('img/svg/feedback.svg') }}" class="block h-1/2 w-1/2 md:h-1/4 md:w-1/4 mx-auto mb-5" alt="A girl writing something into a laptop.">
                <h6>No Comments Yet</h6>
                <p class="text-md">Be the first to comment.</p>
            </div>    
        @endforelse
        {{-- Textarea will be displayed if the user were log in --}}
        @auth
            <div class="w-11/12 md:w-4/5 lg:w-3/5 mt-5 mx-auto p-4 md:p-6 bg-gray-50 shadow-md rounded-lg">
                <form wire:submit.prevent="createComment">
                    <input type="hidden" name="post_id" wire:model="post_id" value="{{ $post_id }}">
                    
                    <textarea class="w-full border-gray-300 focus:border-cyan-500 focus:ring focus:ring-cyan-200 focus:ring-opacity-50 rounded-md shadow-sm" name="body" wire:model="body" rows="5" placeholder="Write a comment"></textarea>
                    <x-jet-input-error for="body" class="mt-2" />

                    <div class="flex items-center justify-end mt-4 space-x-4">
                        <x-jet-button class="bg-green-700 hover:bg-green-500 active:bg-green-700 focus:border-green-700 focus:ring-green-300" type="submit">
                            {{ __('Post') }}
                        </x-jet-button> 
                    </div>

                 </form> 
            </div>
            <br>
            <br>
        @endauth
        {{-- This text will show if user were not log in --}}
        @guest
           <div class="w-11/12 md:w-4/5 lg:w-3/5 mx-auto p-4 md:p-6 text-center">
                <p>Please <a href="{{ route('login') }}" class="text-cyan-500 hover:underline">log in</a> or <a href="{{ route('register') }}" class="text-cyan-500 hover:underline">create an account</a> to participate in this conversation.</p>
           </div>
        @endguest 
    </div>
</div>
