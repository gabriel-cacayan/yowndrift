<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <div class="text-center mb-5">
                <h1 class="font-bold font-ibm text-lg mb-3">Join Yowndrift</h1>
                <h1 class="font-bold text-3xl">Create your account</h1>
            </div>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <input id="name" class="w-full mt-1 block px-0.5 border-0 border-b-2 border-gray-300 focus:ring-0 focus:border-cyan-300" type="text" name="name" :value="old('name')" placeholder="Name" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <input id="email" class="w-full mt-1 block px-0.5 border-0 border-b-2 border-gray-300 focus:ring-0 focus:border-cyan-300" type="email" name="email" :value="old('email')" placeholder="Email" required />
            </div>

            <div class="mt-4">
                <input id="password" class="w-full mt-1 block px-0.5 border-0 border-b-2 border-gray-300 focus:ring-0 focus:border-cyan-300" type="password" name="password" placeholder="Password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <input id="password_confirmation" class="w-full mt-1 block px-0.5 border-0 border-b-2 border-gray-300 focus:ring-0 focus:border-cyan-300" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex flex-col sm:flex-row items-end sm:items-center justify-end mt-4 space-y-5 sm:space-y-0">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="sm:ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
