<x-app-layout>
    <div class="min-h-screen max-h-auto flex flex-col sm:justify-center items-center p-6 bg-gray-200">
        <div>
            <div class="text-center mb-5">
                <h1 class="font-bold font-ibm text-lg mb-3">Write something worth reading</h1>
                <h1 class="font-bold text-3xl">Update your post</h1>
            </div>
        </div>

        <div class="w-full sm:max-w-3xl mt-6 px-6 py-4 bg-gray-50 shadow-md rounded-lg">

            <form  action="{{ route('posts.show', $post->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Category --}}
                <div>
                    <x-jet-label for="category" value="{{ __('Category') }}" />
                    <select class="block w-full mt-1 border-gray-300 focus:border-cyan-500 focus:ring focus:ring-cyan-200 focus:ring-opacity-50 rounded-md shadow-sm" type="select" name="category">
                        <option selected value="{{ $post->category }}">{{ $post->category }}</option>
                        <option value="Technology">Technology</option>
                        <option value="Science">Science</option>
                        <option value="Health">Health</option>
                        <option value="Society">Society</option>
                      </select>
                    <x-jet-input-error for="category" class="mt-2" /> 
                </div>
                
                {{-- Title --}}
                <div class="mt-4">
                    <x-jet-label for="title" value="{{ __('Title') }}" />
                    <x-jet-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ $post->title }}" required />
                    <x-jet-input-error for="title" class="mt-2" />    
                </div>
                
                {{-- Body --}}
                <div class="mt-4">
                    <x-jet-label for="body" value="{{ __('Body') }}" />
                    <textarea value="{!!$post->body!!}" rows="10" class="block w-full mt-1 border-gray-300 focus:border-cyan-500 focus:ring focus:ring-cyan-200 focus:ring-opacity-50 rounded-md shadow-sm" name="body" id="body"></textarea>
                    <x-jet-input-error for="body" class="mt-2" />
                </div>
    
    
                <div class="flex items-center justify-end mt-4">
                    <x-jet-button class="bg-green-700 hover:bg-green-500 active:bg-green-700 focus:border-green-700 focus:ring-green-300" type="submit">
                        {{ __('Update') }}
                    </x-jet-button>
                </div>

            </form>
        </div>
    </div>
    @push('scripts')
        <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>  
    @endpush
</x-app-layout>