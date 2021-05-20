<x-app-layout>
    {{-- To trigger the modal --}}
    <span class="cursor-pointer" wire:click="$toggle('confirmingUserPost')">Write a post</span>

    {{-- Modal content --}}
    <x-jet-dialog-modal wire:model="confirmingUserPost">
        <x-slot name="title">
           <h3 class="text-center font-bold">Create a post</h3>
        </x-slot>
    
        <x-slot name="content">
            
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                
                <div class="mt-4">
                    <x-jet-label for="category" value="{{ __('Category') }}" />
                    <select class="block w-full mt-1 border-gray-300 focus:border-cyan-500 focus:ring focus:ring-cyan-200 focus:ring-opacity-50 rounded-md shadow-sm" type="select" name="category">
                        <option selected>Choose a category</option>
                        <option value="Technology">Technology</option>
                        <option value="Science">Science</option>
                        <option value="Health">Health</option>
                        <option value="Society">Society</option>
                      </select>
                    <x-jet-input-error for="category" class="mt-2" />
                </div>

               <div class="mt-4">
                    <x-jet-label for="title" value="{{ __('Title') }}" />
                    <x-jet-input class="w-full" type="text" name="title" placeholder="The In-Depth Guide To…" />
                    <x-jet-input-error for="title" class="mt-2" />
               </div>

               <div class="mt-4">
                    <x-jet-label for="body" value="{{ __('Body') }}" />
                    <textarea name="body" rows="10" class="block w-full mt-1 border-gray-300 focus:border-cyan-500 focus:ring focus:ring-cyan-200 focus:ring-opacity-50 rounded-md shadow-sm" placeholder="Your text here" id="body">
                    </textarea>
                </div>
                    <x-jet-input-error for="body" class="mt-2"/>

               <div class="flex items-center justify-end mt-4 space-x-4">
                    <x-jet-secondary-button wire:click="$toggle('confirmingUserPost')" wire:loading.attr="disabled">
                        Nevermind
                    </x-jet-secondary-button>

                    <x-jet-button class="bg-green-700 hover:bg-green-500 active:bg-green-700 focus:border-green-700 focus:ring-green-300" wire:loading.attr="disabled" type="submit">
                        {{ __('Publish') }}
                    </x-jet-button> 
                </div>
            </form>

        </x-slot>
    
        <x-slot name="footer">
        </x-slot>

    </x-jet-dialog-modal>
</x-app-layout>