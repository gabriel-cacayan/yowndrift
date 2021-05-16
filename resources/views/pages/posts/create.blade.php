<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create a post') }}
        </h2>
    </x-slot>

        <div class="w-full sm:max-w-3xl mt-6 mx-auto px-6 py-4 bg-gray-50 shadow-md overflow-hidden sm:rounded-lg">
            @livewire('posts.create')
        </div>
    </div>
</x-app-layout>