<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- national_code -->
        <div>
            <x-input-label for="national_code" :value="__('national_code')" />
            <x-text-input id="national_code" class="block mt-1 w-full" type="text" name="national_code" :value="old('national_code')" required autofocus />
            <x-input-error :messages="$errors->get('national_code')" class="mt-2" />
        </div>

        <!-- password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />

            <a href="#" class="text-gray-600 text-sm block text-right pt-1 hover:text-gray-900 ">Forgot Password?</a>

        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
