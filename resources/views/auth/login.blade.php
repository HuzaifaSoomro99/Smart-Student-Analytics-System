<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-50 to-gray-100 px-4">

        <div class="w-full max-w-md bg-white shadow-xl rounded-2xl p-8 border border-gray-100">

            <h2 class="text-2xl font-bold text-gray-800 text-center">Welcome Back</h2>
            <p class="text-sm text-gray-500 text-center mt-1">Login to your account</p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 mt-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="mt-4 space-y-4">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email"
                        class="block mt-1 w-full rounded-lg border-gray-200 focus:border-indigo-500 focus:ring-indigo-500"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required autofocus />
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

                <!-- Remember -->
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                        name="remember">
                    <label for="remember_me" class="ms-2 text-sm text-gray-600">
                        Remember me
                    </label>
                </div>

                <!-- Button + Forgot -->
                <div class="flex flex-col gap-3">

                    <x-primary-button class="w-full justify-center py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 transition">
                        {{ __('Log in') }}
                    </x-primary-button>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-center text-indigo-600 hover:underline"
                            href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    @endif
                </div>

                <!-- Register Link -->
                <p class="text-sm text-center text-gray-600 mt-4">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-indigo-600 hover:underline font-medium">
                        Create account
                    </a>
                </p>
            </form>
        </div>
    </div>
</x-guest-layout>