<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <input id="email" class="w-full placeholder-cyan-500 mt-1 block px-0.5 border-0 border-b-2 border-gray-300 focus:ring-0 focus:border-cyan-300" type="email" name="email" :value="old('email', $request->email)" placeholder="Email" required autofocus />
            </div>

            <div class="mt-4">
                <input id="password" class="w-full placeholder-cyan-500 mt-1 block px-0.5 border-0 border-b-2 border-gray-300 focus:ring-0 focus:border-cyan-300" type="password" name="password" placeholder="Password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <input id="password_confirmation" class="w-full placeholder-cyan-500 mt-1 block px-0.5 border-0 border-b-2 border-gray-300 focus:ring-0 focus:border-cyan-300" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Reset Password') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
