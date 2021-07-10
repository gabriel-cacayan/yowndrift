<div class="min-h-screen max-h-auto flex flex-col justify-center items-center pt-6 sm:pt-0 bg-gray-200">
    <div>
        {{ $logo }}
    </div>

    <div class="w-11/12 sm:max-w-md mt-6 px-6 py-4 bg-gray-50 shadow-md overflow-hidden rounded-lg">
        {{ $slot }}
    </div>
</div>
