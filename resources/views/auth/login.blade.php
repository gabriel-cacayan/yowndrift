<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            {{-- <x-jet-authentication-card-logo /> --}}
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
                <input id="email" class="mt-1 w-full block px-0.5 border-0 border-b-2 border-gray-300 focus:ring-0 focus:border-cyan-300" type="email" name="email" :value="old('email')" placeholder="Email" required autofocus />
            </div>

            <div class="mt-4">
                <input id="password" class="mt-1 w-full block px-0.5 border-0 border-b-2 border-gray-300 focus:ring-0 focus:border-cyan-300" type="password" name="password"  placeholder="Password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex flex-col sm:flex-row items-end sm:items-center justify-end mt-4 space-y-5 sm:space-y-0">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="sm:ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
