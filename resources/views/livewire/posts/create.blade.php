<div>
     <p class="cursor-pointer" wire:click="openModal">Write a post</p>
        {{-- <x-jet-confirmation-modal wire:model="confirmingUserPost">
            <x-slot name="title">
                Creating a post
            </x-slot>
        
            <x-slot name="content">
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
                        <x-jet-input class="w-full" type="text" wire:model="title" name="title" placeholder="The In-Depth Guide To…" />
                        <x-jet-input-error for="title" class="mt-2" />
                   </div>
    
                   <div class="mt-4">
                        <x-jet-label for="body" value="{{ __('Body') }}" />
                        <div class="px-4">
                            <p class="text-sm text-green-700 mt-3">Use the following tag to create a good looking post:
                            </p>
                            <div class="text-sm p-4">
                                <h3>&lt;h3&gt;This is a title&lt;/h3&gt;</h3>
                                <p><strong>&lt;strong&gt;This is a bold text&lt;/strong&gt;</strong></p>
                                <p> <i>&lt;i&gt;This is a italic text&lt;/i&gt;</i></p>
                                <p><i>&lt;br&gt;This is a linebreak</i></p>
                                <q>&lt;q&gt;This is a quote text&lt;/q&gt;</q>
                                <p>&lt;p&gt;This is a paragraph&lt;/p&gt;</p>
                            </div>
                        </div>
                        <textarea name="body" rows="10" class="block w-full mt-1 border-gray-300 focus:border-cyan-500 focus:ring focus:ring-cyan-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model="body" placeholder="Once upon a time...">
                        </textarea>
                        <x-jet-input-error for="body" class="mt-2"/>
                   </div>
    
                   <div class="flex items-center justify-end mt-4">
                        <x-jet-button class="bg-green-700 hover:bg-green-500 active:bg-green-700 focus:border-green-700 focus:ring-green-300">
                            {{ __('Publish') }}
                        </x-jet-button> 
                    </div>
            </form>
            </x-slot>
        
            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingUserPost')" wire:loading.attr="disabled">
                    Nevermind
                </x-jet-secondary-button>
        
                <x-jet-danger-button class="ml-2" wire:click="deleteUser" wire:loading.attr="disabled">
                    Delete Account
                </x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal> --}}

        
        <x-jet-dialog-modal wire:model="confirmingUserPost">
            <x-slot name="title">
               <h3 class="text-center font-bold">Create a post</h3>
            </x-slot>
        
            <x-slot name="content">
                
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
                        <x-jet-input class="w-full" type="text" wire:model="title" name="title" placeholder="The In-Depth Guide To…" />
                        <x-jet-input-error for="title" class="mt-2" />
                   </div>
    
                   <div class="mt-4">
                        <x-jet-label for="body" value="{{ __('Body') }}" />
                        {{-- <div class="px-4">
                            <p class="text-sm text-green-700 mt-3">Use the following tag to create a good looking post:
                            </p>
                            <div class="text-sm p-4">
                                <h3>&lt;h3&gt;This is a title&lt;/h3&gt;</h3>
                                <p><strong>&lt;strong&gt;This is a bold text&lt;/strong&gt;</strong></p>
                                <p><i>&lt;i&gt;This is a italic text&lt;/i&gt;</i></p>
                                <p><i>&lt;br&gt;This is a linebreak</i></p>
                                <q>&lt;q&gt;This is a quote text&lt;/q&gt;</q>
                                <p>&lt;p&gt;This is a paragraph&lt;/p&gt;</p>
                            </div>
                        </div> --}}
                        <textarea name="body" rows="10" class="block w-full mt-1 border-gray-300 focus:border-cyan-500 focus:ring focus:ring-cyan-200 focus:ring-opacity-50 rounded-md shadow-sm" wire:model="body" placeholder="Your text here" id="body">
                        </textarea>
                        <x-jet-input-error for="body" class="mt-2"/>
                   </div>
    
                   <div class="flex items-center justify-end mt-4 space-x-4">
                        <x-jet-secondary-button wire:click="$toggle('confirmingUserPost')" wire:loading.attr="disabled">
                            Nevermind
                        </x-jet-secondary-button>

                        <x-jet-button class="bg-green-700 hover:bg-green-500 active:bg-green-700 focus:border-green-700 focus:ring-green-300" wire:loading.attr="disabled">
                            {{ __('Publish') }}
                        </x-jet-button> 
                    </div>
                </form>

            </x-slot>
        
            <x-slot name="footer">
                {{-- <x-jet-secondary-button wire:click="$toggle('confirmingUserPost')" wire:loading.attr="disabled">
                    Nevermind
                </x-jet-secondary-button> --}}
    
                {{-- <x-jet-button class="bg-green-700 hover:bg-green-500 active:bg-green-700 focus:border-green-700 focus:ring-green-300" wire:loading.attr="disabled">
                    {{ __('Publish') }}
                </x-jet-button> --}}
            </x-slot>
        </x-jet-dialog-modal>

        @push('scripts')
            <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
        @endpush

</div>

