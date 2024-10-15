<x-main-layout>
    <section class="space-y-10 md:space-y-16">
        @foreach ($ads as $ad)
            <article class="flex flex-col lg:flex-row pb-10 md:pb-16 border-b">
                <div class="max-h-72 w-1/3">
                    <img class="px-3 w-full max-h-72 object-cover lg:max-h-none lg:h-full" src="{{ str_starts_with($ad->image, "http") ? $ad->image : "/images/".$ad->image }}" alt="{{ $ad->description }}" />
                </div>
                <div class="flex flex-col items-start mt-5 space-y-5 lg:w-7/12 lg:mt-0 lg:ml-12">

                    <a href="" class="font-bold text-slate-500 text-lg">{{ $ad->categorie->name }}</a>
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


    </section>
    <div class="h-24 w-full flex flex-col justify-center p-4 text-black">
        {{ $ads->links() }}
    </div>
</x-main-layout>
