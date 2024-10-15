<x-main-layout>
    <div class="flex flex-col lg:flex-row pb-10 md:pb-16 border-b">
        <div class="max-h-72 w-1/3">
            <img class="px-3 w-full max-h-72 object-cover lg:max-h-none lg:h-full"
                src="{{ str_starts_with($ad->image, 'http') ? $ad->image : '/images/' . $ad->image }}"
                alt="Image du produit" />
        </div>
        <div class="flex flex-col items-start mt-5 space-y-5 lg:w-7/12 lg:mt-0 lg:ml-12">
            <h2 class="text-2xl font-bold">{{ $ad->name }}</h2>
            <p class="text-gray-500">{{ $ad->description }}</p>
            <div class="">
                <p class="text-2xl font-bold">{{ $ad->price }} €</p>
                <br>
                <p class="text-gray-500">Location : {{ $ad->location }}</p>
            </div>
            <div class="">
                <p class="text-gray-500">Status : {{ $ad->status }}</p>
                <p class="text-gray-500">Categorie : {{ $ad->categorie->name }}</p>
            </div>
            <div class="">
                <p class="text-gray-500">{{ $ad->created_at->diffForHumans() }}</p>
                <p class="text-gray-500">Added by : {{ $ad->user->name }}</p>
            </div>
        </div>
    </div>
    <div class="flex justify-center mt-10">
        <a href="{{ route('home') }}" class="bg-violet-900 w-max text-white font-bold px-8 py-2 rounded">Back</a>
    </div>
</x-main-layout>
