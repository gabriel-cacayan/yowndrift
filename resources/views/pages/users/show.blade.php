<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My posts') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="flex flex-col max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Title 
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Category
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date Published
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date Updated
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">View</span>
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Delete</span>
                            </th>
                        </tr>
                        </thead>
                        @forelse ($posts as $post)
                            <tbody class="bg-gray-50 divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $post->title }}
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $post->category }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ \Carbon\Carbon::parse ($post->created_at)->format('F d, Y') }}
                                    </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @if($post->updated_at === $post->created_at)
                                        @else
                                            {{ \Carbon\Carbon::parse ($post->updated_at)->format('F d, Y') }}
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="posts/{{ $post->post_id }}" class="text-gray-600 hover:text-gray-900 flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                          </svg> View</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="posts/{{ $post->post_id }}/edit" class="text-indigo-600 hover:text-indigo-900 flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                          </svg> Edit</a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="#" class="text-red-600 hover:text-red-900 flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                          </svg> Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        @empty
                            <tbody class="bg-gray-50 divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <h1 class="text-center">No posts created.</h1>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    </td>
                                     <td class="px-6 py-4 whitespace-nowrap">
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                    </td>
                                </tr>
                            </tbody>
                        @endforelse
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>


    <div class="hidden" id="edit-content">
         <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!--
                Background overlay, show/hide based on modal state.
        
                Entering: "ease-out duration-300"
                From: "opacity-0"
                To: "opacity-100"
                Leaving: "ease-in duration-200"
                From: "opacity-100"
                To: "opacity-0"
            -->
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" id="edit-overlay"></div>
        
            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        
            <!--
                Modal panel, show/hide based on modal state.
        
                Entering: "ease-out duration-300"
                From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                To: "opacity-100 translate-y-0 sm:scale-100"
                Leaving: "ease-in duration-200"
                From: "opacity-100 translate-y-0 sm:scale-100"
                To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            -->
            <div class="inline-block align-bottom bg-gray-50 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-gray-50 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                    <!-- Heroicon name: outline/exclamation -->
                    <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                        Deactivate account
                    </h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500">
                        Are you sure you want to deactivate your account? All of your data will be permanently removed. This action cannot be undone.
                        </p>
                    </div>
                    </div>
                </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-gray-50 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Deactivate
                </button>
                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-gray-50 text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Cancel
                </button>
                </div>
            </div>
            </div>
        </div>
    </div>

   
    
</x-app-layout>