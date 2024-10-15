<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Free Ads') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-slate-900 text-white">
    <header class="bg-slate-700 fixed shadow-lg w-full flex justify-between h-24">
        <div class="flex">
            <div class="my-auto mx-4">
                <p class="text-3xl font-bold text-white">Free Ads</p>
                <p class="text-slate-400">BY NEXUS</p>
            </div>
            @if (Route::currentRouteName() !== 'search')
                <form class="flex my-auto" action="{{ route('search') }}" method="post">
                    @csrf
                    <div class="relative max-w-xs text-gray-600 focus-within:text-gray-800 justify-center pl-2">
                        <div
                            class="absolute inset-y-0 left-0 flex items-center justify-center pl-2 pointer-events-none">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                <path
                                    d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                                </path>
                            </svg>
                        </div>
                        <input name="search"
                            class="sm:w-full h-10 pl-8 text-gray-700 placeholder-gray-600 bg-gray-200 rounded outline-none shadow-md focus:bg-white"
                            type="text" placeholder="Quick search..." />
                        @error('search')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit"
                            class="bg-violet-900 text-white font-bold px-8 py-2 rounded">Search</button>
                    </div>
                </form>
            @endif
        </div>
        <nav class="space-x-6 my-auto mx-4 flex py-4">
            <a href="/ads/create" class="px-4 py-4 text-white bg-violet-900 font-bold rounded">New ads +</a>
            @auth
                <a href="/ads" class="mx-4 my-auto">My ads</a>
                <div class="relative my-auto inline-block text-left" x-data="{ open: false }">
                    <img @click="open = ! open" class="inline-block h-6 w-6 rounded-full ring-2 ring-white"
                        src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="User profile">
                    <div x-cloak x-show="open"
                        x-bind:class="open ? 'transform opacity-100 scale-100 block' : 'transform opacity-0 scale-95 hidden'"
                        @click.away="open = false"
                        class="absolute transition ease-in-out duration-100 right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                        <div class="py-1" role="none">
                            <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                            <a href="/profile" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1"
                                id="menu-item-0">Profile</a>
                            <form method="POST" action="{{ route('logout') }}" role="none">
                                @method('POST')
                                @csrf
                                <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-gray-700"
                                    role="menuitem" tabindex="-1" id="menu-item-3">Sign out</button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <a href="/login"
                    class="font-bold text-white hover:text-slate-900 uppercase my-auto tracking-widest">Login</a>
                <a href="/register"
                    class="font-bold text-white hover:text-slate-900 uppercase my-auto tracking-widest">Register</a>
            @endauth
        </nav>
    </header>
    <div class="min-h-screen pt-32">
        {{ $slot }}
    </div>
</body>

</html>
