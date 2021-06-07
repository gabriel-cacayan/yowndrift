<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <h1 class="font-bold font-ibm text-2xl mb-5">Login to Yowndrift</h1>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-input id="email" type="email" name="email" :value="old('email')" placeholder="Email" required autofocus class="mt-1 w-full" />
            </div>

            <div class="mt-4">
                <x-jet-input id="password" type="password" name="password" placeholder="Password" required autocomplete="current-password" class="mt-1 w-full" />
            </div>

            {{-- <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div> --}}

            <div class="flex flex-col justify-center items-center mt-5 space-y-5">

                <x-jet-button class="w-full justify-center">
                    {{ __('Log in') }}
                </x-jet-button>

                {{-- @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="underline text-sm text-gray-600 hover:text-gray-900">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif --}}

            </div>

            <div class="my-10 border-t border-gray-300"></div>

            <div class="flex flex-col justify-center items-center mt-5 space-y-3">
                
                {{-- <a href="{{ route('login.facebook') }}" class="normal-case w-full flex items-center px-4 py-2 bg-gray-50 border border-gray-300 rounded-md font-semibold text-xs text-gray-500 uppercase tracking-widest shadow-sm hover:text-gray-700 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-100 disabled:opacity-25 transition">
                    <img src="{{ asset('img/icon/facebook.png') }}" alt="facebook icon" class="h-5 w-5 mr-3">
                    {{ __('Log in with Facebook') }}
                </a> --}}

                <a href="{{ route('login.google') }}" class="normal-case w-full flex items-center px-4 py-2 bg-gray-50 border border-gray-300 rounded-md font-semibold text-xs text-gray-500 uppercase tracking-widest shadow-sm hover:text-gray-700 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-100 disabled:opacity-25 transition">
                    <img src="{{ asset('img/icon/google.png') }}" alt="google icon" class="h-5 w-5 mr-3">
                    {{ __('Log in with Google') }}
                </a>

                <a href="{{ route('login.github') }}" class="normal-case w-full flex items-center px-4 py-2 bg-gray-50 border border-gray-300 rounded-md font-semibold text-xs text-gray-500 uppercase tracking-widest shadow-sm hover:text-gray-700 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-100 disabled:opacity-25 transition">
                    <img src="{{ asset('img/icon/github.png') }}" alt="github icon" class="h-5 w-5 mr-3">
                    {{ __('Log in with GitHub') }}
                </a>
            
            </div>

            <div class="flex justify-center items-center mt-5">
                <a href="{{ route('register') }}" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Create an account') }}
                </a>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
