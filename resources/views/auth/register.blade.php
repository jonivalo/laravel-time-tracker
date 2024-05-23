<x-guest-layout>
    <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-lg shadow-md p-8">
        <h2 class="text-3xl font-bold text-center text-gray-900 dark:text-white mb-8">
            {{ __('Create an Account') }}
        </h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="relative mb-6">
                <label for="name" class="absolute -top-4 left-3 bg-white dark:bg-gray-800 px-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Name') }}
                </label>
                <input id="name" class="block w-full mt-6 px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring focus:ring-pink-500 focus:border-pink-500" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="relative mb-6">
                <label for="email" class="absolute -top-4 left-3 bg-white dark:bg-gray-800 px-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Email') }}
                </label>
                <input id="email" class="block w-full mt-6 px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring focus:ring-pink-500 focus:border-pink-500" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="relative mb-6">
                <label for="password" class="absolute -top-4 left-3 bg-white dark:bg-gray-800 px-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Password') }}
                </label>
                <input id="password" class="block w-full mt-6 px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring focus:ring-pink-500 focus:border-pink-500"
                              type="password"
                              name="password"
                              required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="relative mb-6">
                <label for="password_confirmation" class="absolute -top-4 left-3 bg-white dark:bg-gray-800 px-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Confirm Password') }}
                </label>
                <input id="password_confirmation" class="block w-full mt-6 px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring focus:ring-pink-500 focus:border-pink-500"
                              type="password"
                              name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-between mt-6">
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button type="submit" class="inline-flex items-center px-6 py-2 bg-pink-500 text-white font-bold rounded-lg shadow-md hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 dark:focus:ring-offset-gray-800">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
