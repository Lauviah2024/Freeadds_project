<x-auth-layout>
    <div class="text-white p-4 w-1/2 bg-slate-700 rounded-lg">
        <h2 class="text-xl font-bold tracking-widest">
            {{ __('Réinitialiser le mot de passe') }}
        </h2>
        <form action="{{ route('password.update') }}" method="post">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="mt-4">
                <x-input-label for="email" :value="__('Adresse email')" />
                <input type="email" name="email" id="email" class="rounded-none outline-none bg-transparent border-b-2 border-white text-white my-4 w-full" required>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="password" :value="__('Mot de passe')" />
                <input type="password" name="password" id="password" class="rounded-none outline-none bg-transparent border-b-2 border-white text-white my-4 w-full" required>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />
                <input type="password" name="password_confirmation" id="password_confirmation" class="rounded-none outline-none bg-transparent border-b-2 border-white text-white my-4 w-full" required>
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-primary-button>
                    {{ __('Réinitialiser le mot de passe') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-auth-layout>
