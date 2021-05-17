<div>
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
                    <x-jet-input class="w-full" type="text" wire:model="title" name="title" placeholder="Title" />
                    <x-jet-input-error for="title" class="mt-2" />
               </div>

               <div class="mt-4">
                    <x-jet-label for="body" value="{{ __('Body') }}" />
                    <div class="px-4">
                        <p class="text-sm text-green-700 mt-3">Use the following tag to create a good looking post:
                        </p>
                        {{-- <x-jet-label class="text-sm" for="body" value="<h3></h3>, <p></p>, <strong></strong>, <br>, <q></q>" /> --}}
                        <ul>
                            <li><x-jet-label class="text-sm" value="Big text: <h3></h3>" /></li>
                            <li><x-jet-label class="text-sm" value="Paragraph: <p></p>" /></li>
                            <li><x-jet-label class="text-sm" value="Bold: <strong></strong>" /></li>
                            <li><x-jet-label class="text-sm" value="Line break: <br>" /></li>
                            <li><x-jet-label class="text-sm" value="Qoute: <q></q>" /></li>
                        </ul>
                    </div>
                    <textarea name="body" rows="10" class="block w-full mt-1 border-gray-300 focus:border-cyan-500 focus:ring focus:ring-cyan-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model="body">
                    </textarea>
                    <x-jet-input-error for="body" class="mt-2"/>
               </div>

               <div class="flex items-center justify-end mt-4">
                    <x-jet-button class="bg-green-700 hover:bg-green-500 active:bg-green-700 focus:border-green-700 focus:ring-green-300">
                        {{ __('Publish') }}
                    </x-jet-button> 
                </div>
        </form>
        {{-- @push('scripts') 
            <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
        @endpush     --}}
</div>
