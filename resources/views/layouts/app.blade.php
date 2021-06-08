<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('img/icon/icon.png') }}">

        <!-- Primary Meta Tags -->
        <title>{{ env('APP_NAME', 'Yowndrift')}}</title>
        <meta name="title" content="Yowndrift — Built for Bloggers">
        <meta name="description" content="Read interesting topics and share your ideas to everyone.">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://yowndrift.herokuapp.com/">
        <meta property="og:title" content="Yowndrift — Built for Bloggers">
        <meta property="og:description" content="Read interesting topics and share your ideas to everyone.">
        <meta property="og:image" content="{{ asset('img/yowndrift_landing.png') }}">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://yowndrift.herokuapp.com/">
        <meta property="twitter:title" content="Yowndrift — Built for Bloggers">
        <meta property="twitter:description" content="Read interesting topics and share your ideas to everyone.">
        <meta property="twitter:image" content="{{ asset('img/yowndrift_landing.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono&family=Poppins&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{ asset('js/search.js') }}" defer></script>
        @stack('scripts')

    </head>
    <body class="font-sans antialiased">

        <div class="min-h-screen bg-gray-200">
            @livewire('navigation-menu')
            
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-gray-50 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <x-jet-banner />
            
            <!-- Page Content -->
            <main class="bg-gray-200">
                {{ $slot }}
            </main>
            @include('footer')
        </div>

        @stack('modals')

        @livewireScripts
        
        <script>
            //CkEditor Version 5           
            // ClassicEditor.create(document.getElementById('body'))
            // .then(editor => { thisEditor = editor });

            //CkEditor Version 4        
            CKEDITOR.replace( 'body' );
        </script> 
    </body>
</html>