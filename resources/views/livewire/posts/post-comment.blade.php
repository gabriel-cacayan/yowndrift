<div>
    <h3 class="w-11/12 sm:w-3/5 mx-auto py-4 sm:py-6">Comments</h3>
        @foreach ($comments as $comment)
            <div class="w-11/12 sm:w-3/5 mx-auto mb-3 p-4 sm:p-6 bg-gray-50 shadow-md rounded-lg">
                <p class="text-cyan-500 mb-3 text-md">{{ optional($comment)->user->name }} <span class="ml-3 text-gray-700 text-sm">Posted {{ Carbon\Carbon::parse(optional($comment)->created_at)->diffForHumans() }}</span></p>
                <p>{!! optional($comment)->body !!}</p>
            </div>
        @endforeach
        @auth
            <div class="w-11/12 sm:w-3/5 my-5 mx-auto p-4 sm:p-6 bg-gray-900 shadow-md rounded-lg">
                <form wire:submit.prevent="createComment">
                    <input type="hidden" name="post_id" wire:model="post_id" value="{{ $post_id }}">
                    
                    <textarea class="w-full" name="body" wire:model="body" rows="10"></textarea>
                    <x-jet-input-error for="body" class="mt-2" />

                    <div class="flex items-center justify-end mt-4 space-x-4">
                        <x-jet-button class="bg-green-700 hover:bg-green-500 active:bg-green-700 focus:border-green-700 focus:ring-green-300" type="submit">
                            {{ __('Post') }}
                        </x-jet-button> 
                    </div>

                 </form> 
            </div>
        @endauth
        @guest
           <div class="w-11/12 sm:w-3/5 my-5 mx-auto p-4 sm:p-6 text-center">
                <p>Please <a href="{{ route('login') }}" class="text-cyan-500 hover:underline">log in</a> or <a href="{{ route('register') }}" class="text-cyan-500 hover:underline">create an account</a> to participate in this conversation.</p>
           </div>
        @endguest 
</div>
