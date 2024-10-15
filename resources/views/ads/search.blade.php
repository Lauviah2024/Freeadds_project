<x-main-layout>
    <form action="{{ route('search') }}" method="POST" class="my-10 px-4 h-24 grid grid-cols-3 gap-10 w-full">
        @csrf
        <div class="h-max flex-col flex my-auto">
            <label for="search">Nom du ads</label>
            <input id="search" type="search" class="rounded-lg text-black bg-white placeholder:text-gray-500 h-10"
                name="search">
        </div>
        <div class="h-max flex-col flex my-auto">
            <label for="location">Location</label>
            <input id="location" type="number" class="rounded-lg text-black bg-white placeholder:text-gray-500 h-10"
                name="location">
        </div>
        <div class="flex flex-col h-max my-auto">
            <label for="categories" class="text-white">Choose a category</label>
            <select id="categories" name="category_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg border-s-gray-100 dark:border-s-gray-700 border-s-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">All</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="flex flex-col h-max my-auto">
            <label for="status" class="text-white">Condition</label>
            <select id="status" name="status"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg border-s-gray-100 dark:border-s-gray-700 border-s-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach (["new", "good", "used"] as $key => $cat)
                    <option value="{{ $key }}">
                        {{ $cat }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="h-max flex-col flex my-auto col-span-1">
            <label for="price">Price range</label>
            <div class="flex justify-between">
                <input id="price" type="number" class="text-black rounded-lg bg-white placeholder:text-gray-500 h-10 w-32"
                name="min">
            <input id="price" type="number" class="rounded-lg text-black bg-white placeholder:text-gray-500 h-10 w-32"
                name="max">
            </div>
        </div>
        <div class="col-span-1 mt-6">
            <button type="submit" class="bg-violet-900 text-white font-bold px-8 py-2 w-full rounded">Search</button>
        </div>
    </form>

    <section class="space-y-10 md:space-y-16 min-h-[50vh] flex flex-col justify-center text-center my-28">
        @if ($results && $results->count() > 0)
            @foreach ($results as $ad)
                <article class="flex flex-col lg:flex-row pb-10 md:pb-16 border-b">
                    <div class="max-h-72 w-1/3">
                        <img class="px-3 w-full max-h-72 object-cover lg:max-h-none lg:h-full" src="{{ str_starts_with($ad->image, "http") ? $ad->image : "/images/".$ad->image }}"
                            alt="Image du produit" />
                    </div>
                    <div class="flex flex-col items-start mt-5 space-y-5 lg:w-7/12 lg:mt-0 lg:ml-12">

                        <span class="font-bold text-slate-500 text-lg">{{ $ad->categorie->name }}</span>

                        <h1 class="font-bold text-white text-3xl lg:text-5xl leading-tight">
                            {{ $ad->title }}
                        </h1>

                        <p class="text-xl lg:text-2xl text-white">
                            {{ $ad->description }}
                        </p>

                        <a href="{{ route('homeads.show', $ad->id) }}"
                            class="flex items-center px-5 py-7 font-semibold bg-violet-900 hover:bg-violet-500 transition-all duration-300 text-white rounded-xl gap-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M15.5 5C16.9045 5 17.6067 5 18.1111 5.33706C18.3295 5.48298 18.517 5.67048 18.6629 5.88886C19 6.39331 19 7.09554 19 8.5V18C19 19.8856 19 20.8284 18.4142 21.4142C17.8284 22 16.8856 22 15 22H9C7.11438 22 6.17157 22 5.58579 21.4142C5 20.8284 5 19.8856 5 18V8.5C5 7.09554 5 6.39331 5.33706 5.88886C5.48298 5.67048 5.67048 5.48298 5.88886 5.33706C6.39331 5 7.09554 5 8.5 5"
                                    stroke="black" stroke-width="2" />
                                <path
                                    d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5C15 6.10457 14.1046 7 13 7H11C9.89543 7 9 6.10457 9 5Z"
                                    stroke="black" stroke-width="2" />
                                <path d="M9 12L15 12" stroke="black" stroke-width="2" stroke-linecap="round" />
                                <path d="M9 16L13 16" stroke="black" stroke-width="2" stroke-linecap="round" />
                            </svg>
                            Show more
                        </a>
                        <p class="text-slate-400 uppercase">BY {{ $ad->user->name }}</p>

                    </div>

                </article>
            @endforeach
            <div class="h-24 w-full flex flex-col justify-center p-4 text-black">
                {{ $results->links() }}
            </div>
        @else
            <p class="text-3xl text-center">No ads found</p>
        @endif
    </section>
</x-main-layout>
