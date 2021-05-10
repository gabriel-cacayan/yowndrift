<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('img/logo/Icon_logo.png') }}">

        <title>{{ env('APP_NAME', 'Yowndrift')}}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono&family=Poppins&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        @stack('scripts')

    </head>
    <body class="font-sans antialiased">
        @livewire('navigation-menu')

        <main>
            {{ $slot }}
        </main>

        @stack('modals')

        @livewireScripts

        <script>
            ClassicEditor
                .create( document.getElementById( 'editor' ), {
                    toolbar: {
                        items: [
                            'heading', '|',
                            'alignment', '|',
                            'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                            'link', '|',
                            'bulletedList', 'numberedList', 'todoList',
                            '-', // break point
                            'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor', '|',
                            'code', 'codeBlock', '|',
                            '|',
                            'outdent', 'indent', '|',
                            'blockQuote', '|',
                            'undo', 'redo'
                        ],
                    }
                }, )
                .catch( error => {
                    console.log( error );
                } );
        </script>
    </body>
</html>
