<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <h1 class="font-bold font-ibm text-2xl mb-5">Reset your password</h1>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div>
                <x-jet-input id="email" type="email" name="email" :value="old('email')" placeholder="Email" required autofocus class="mt-1 w-full" />
            </div>

            <div class="mt-4">
                <x-jet-input id="password" type="password" name="password" placeholder="Password" required autocomplete="new-password" class="mt-1 w-full"/>
            </div>

            <div class="mt-4">
                <x-jet-input id="password_confirmation" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" class="mt-1 w-full" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Reset Password') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
