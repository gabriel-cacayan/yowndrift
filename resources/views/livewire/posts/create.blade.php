<div>
    @push('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    @endpush
    {{-- <x-jet-validation-errors class="mb-4" /> --}}

        <form wire:submit.prevent="createPost">
                
                <div class="mt-4">
                    <x-jet-label for="category" value="{{ __('Category') }}" />
                    <select class="block w-full mt-1 border-gray-300 focus:border-cyan-500 focus:ring focus:ring-cyan-200 focus:ring-opacity-50 rounded-md shadow-sm" type="select" name="category" wire:model="category">
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
                    <x-jet-input class="w-full" type="text" wire:model="title" name="title" placeholder="Title"/>
                    <x-jet-input-error for="title" class="mt-2" />
               </div>

               <div class="mt-4">
                    <x-jet-label for="body" value="{{ __('Body') }}" />
                    <textarea id="body" rows="10" class="block w-full mt-1 border-gray-300 focus:border-cyan-500 focus:ring focus:ring-cyan-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model="body" name="body"></textarea>
                    <x-jet-input-error for="body" class="mt-2" />
               </div>

               <div class="flex items-center justify-end mt-4">
                    <x-jet-button class="bg-green-700 hover:bg-green-500 active:bg-green-700 focus:border-green-700 focus:ring-green-300">
                        {{ __('Post') }}
                    </x-jet-button> 
                </div>
        </form> 
</div>
