<x-auth-layout>
    <form method="POST" action="{{ route('register') }}" class="w-1/3  border border-gray-400 bg-blue-950 p-4 rounded-lg">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label class="uppercase tracking-widest my-2" for="name" :value="__('Name')" />
            <input id="name" class="rounded-none outline-none bg-transparent border-b-2 border-white text-white my-4 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Login -->
        <div>
            <x-input-label class="uppercase tracking-widest my-2" for="login" :value="__('Login')" />
            <input id="login" class="rounded-none outline-none bg-transparent border-b-2 border-white text-white my-4 w-full" type="text" name="login" :value="old('login')" required
                autofocus autocomplete="login" />
            <x-input-error :messages="$errors->get('login')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label class="uppercase tracking-widest my-2" for="email" :value="__('Email')" />
            <input id="email" class="rounded-none outline-none bg-transparent border-b-2 border-white text-white my-4 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phone Number -->
        <div class="mt-4">
            <x-input-label class="uppercase tracking-widest my-2" for="phone_number" :value="__('Phone number')" />
            <input id="phone_number" class="rounded-none outline-none bg-transparent border-b-2 border-white text-white my-4 w-full" type="phone" name="phone_number" :value="old('phone_number')"
                required autocomplete="phone_number" />
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label class="uppercase tracking-widest my-2" for="password" :value="__('Password')" />

            <input id="password" class="rounded-none outline-none bg-transparent border-b-2 border-white text-white my-4 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label class="uppercase tracking-widest my-2" for="password_confirmation" :value="__('Confirm Password')" />

            <input id="password_confirmation" class="rounded-none outline-none bg-transparent border-b-2 border-white text-white my-4 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('register') }}">
                {{ __('Dejà enregistré ?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('S\'inscrire') }}
            </x-primary-button>
        </div>
    </form>
</x-auth-layout>
