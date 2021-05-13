<button {{ $attributes->merge(['type' => 'button', 'class' => 'block w-full sm:w-auto sm:inline-flex items-center px-4 py-2 bg-gray-50 border border-gray-300 rounded-md font-semibold text-xs text-cyan-500 uppercase tracking-widest shadow-sm hover:text-cyan-700 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-cyan-800 active:bg-gray-100 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
