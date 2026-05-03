<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-50 to-gray-100 px-4">

        <div class="w-full max-w-md bg-white shadow-xl rounded-2xl p-8 border border-gray-100">

            <h2 class="text-2xl font-bold text-gray-800 text-center">Create Account</h2>
            <p class="text-sm text-gray-500 text-center mt-1">Register to get started</p>

            <form method="POST" action="{{ route('register') }}" class="mt-6 space-y-4">
                @csrf

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name"
                        class="block mt-1 w-full rounded-lg border-gray-200 focus:border-indigo-500 focus:ring-indigo-500"
                        type="text"
                        name="name"
                        :value="old('name')"
                        required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email"
                        class="block mt-1 w-full rounded-lg border-gray-200 focus:border-indigo-500 focus:ring-indigo-500"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password"
                        class="block mt-1 w-full rounded-lg border-gray-200 focus:border-indigo-500 focus:ring-indigo-500"
                        type="password"
                        name="password"
                        required />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation"
                        class="block mt-1 w-full rounded-lg border-gray-200 focus:border-indigo-500 focus:ring-indigo-500"
                        type="password"
                        name="password_confirmation"
                        required />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Button -->
                <x-primary-button class="w-full justify-center mt-4 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 transition">
                    {{ __('Create Account') }}
                </x-primary-button>

                <!-- Login Link -->
                <p class="text-sm text-center text-gray-600 mt-4">
                    Already registered?
                    <a href="{{ route('login') }}" class="text-indigo-600 hover:underline font-medium">
                        Login here
                    </a>
                </p>
            </form>
        </div>
    </div>
</x-guest-layout>