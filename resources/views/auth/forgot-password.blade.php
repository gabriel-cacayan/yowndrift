<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <h1 class="font-bold font-ibm text-2xl mb-5">Reset your password</h1>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div>
                <x-jet-input id="email" type="email" name="email" :value="old('email')" placeholder="Email" required autofocus class="mt-1 w-full" />
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-jet-button class="w-full justify-center">
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
