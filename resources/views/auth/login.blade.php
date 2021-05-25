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
                <x-jet-input id="email" class="mt-1 w-full" type="email" name="email" :value="old('email')" placeholder="Email" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-input id="password" class="mt-1 w-full" type="password" name="password"  placeholder="Password" required autocomplete="current-password" />
            </div>

            {{-- <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div> --}}

            <div class="flex flex-col justify-center items-center mt-5 space-y-5">

                <x-jet-button class="sm:flex sm:w-full justify-center">
                    {{ __('Log in') }}
                </x-jet-button>

                {{-- @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif --}}

                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    {{ __('Create an account') }}
                </a>

            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
