<x-auth-layout>
    <form method="POST" action="{{ route('login') }}" class="w-1/3  border border-gray-400 bg-blue-950 p-4 rounded-lg">
        @csrf

        <!-- Login -->
        <div>
            <x-input-label class="uppercase tracking-widest my-2" for="login" :value="__('Login')" />
            <input class="rounded-none outline-none bg-transparent border-b-2 border-white text-white my-4 w-full"
                id="login" class="block mt-1 w-full" type="text" name="login" :value="old('login')" required
                autofocus autocomplete="login" />
            <x-input-error :messages="$errors->get('login')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label class="uppercase tracking-widest my-2" for="password" :value="__('Password')" />

            <input id="password"
                class="rounded-none outline-none bg-transparent border-b-2 border-white text-white my-4 w-full"
                type="password" name="password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('register') }}">
                {{ __('Pas encore enregistré ?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Se connecter') }}
            </x-primary-button>
        </div>
        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
            href="{{ route('password.request') }}">
            {{ __('Mot de pass oublié') }}
        </a>
    </form>
</x-auth-layout>
