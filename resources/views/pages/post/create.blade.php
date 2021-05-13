<x-guest-user-layout>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <div class="text-center mb-5">
                <h1 class="font-bold font-ibm text-lg mb-3">Write something worth reading</h1>
                <h1 class="font-bold text-3xl">Create a post</h1>
            </div>
        </div>

        <div class="w-full sm:max-w-3xl mt-6 px-6 py-4 bg-gray-50 shadow-md overflow-hidden sm:rounded-lg">
            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('post.store') }}">
                @csrf
                
                <div>
                    <x-jet-label for="category" value="{{ __('Category') }}" />
                    <select class="block w-full mt-1 border-gray-300 focus:border-cyan-500 focus:ring focus:ring-cyan-200 focus:ring-opacity-50 rounded-md shadow-sm" type="select" name="category">
                        <option selected>Choose a category</option>
                        <option value="Technology">Technology</option>
                        <option value="Science">Science</option>
                        <option value="Health">Health</option>
                        <option value="Society">Society</option>
                      </select>
                </div>
    
                <div class="mt-4">
                    <x-jet-label for="title" value="{{ __('Title') }}" />
                    <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required />
                </div>
    
                <div class="mt-4">
                    <x-jet-label for="body" value="{{ __('Body') }}" />
                    <textarea rows="10" class="block mt-1 w-full" placeholder="Your text here" name="body" :value="old('body')" id="editor"></textarea>
                </div>
    
    
                <div class="flex items-center justify-end mt-4">
    
                    <x-jet-button>
                        {{ __('Post') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
       
    </div>

    @push('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
    @endpush
</x-guest-user-layout>