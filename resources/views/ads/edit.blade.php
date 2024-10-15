<x-main-layout>
    <div class="flex flex-col justify-center items-center w-full h-full">
        <form enctype="multipart/form-data" action="{{ route("ads.update", $ad) }}" method="POST"
            class="my-4 rounded-lg w-2/3 bg-white">
            @method('PUT')
            @csrf
            <div class="space-y-12  p-4">
                <div class="border-b border-gray-900/10 pb-12">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Create ads</h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600">Créer un nouveau ad gratuitement</p>
                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">
                                Ad title
                            </label>
                            <div class="mt-2">
                                <input required type="text" name="title" value="{{ $ad->title }}" id="title" autocomplete="title"
                                    class="block w-full rounded-md border-0 focus:outline-none py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('title')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="price" class="block text-sm font-medium leading-6 text-gray-900">
                                Ad price
                            </label>
                            <div class="mt-2">
                                <input required type="text" name="price" value="{{ $ad->price }}" id="price" autocomplete="price"
                                    class="block w-full rounded-md border-0 focus:outline-none py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('price')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="description" class="block text-sm font-medium leading-6 text-gray-900">
                                Ad description
                            </label>
                            <div class="mt-2">
                                <textarea required type="text" name="description" id="description" autocomplete="description"
                                    class="block w-full rounded-md border-0 focus:outline-none py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    {{ $ad->description }}
                                </textarea>
                            </div>
                            @error('description')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-3">
                            <label for="location" class="block text-sm font-medium leading-6 text-gray-900">
                                Ad location
                            </label>
                            <div class="mt-2">
                                <input required type="number" value="{{ $ad->location }}" name="location" id="location" autocomplete="location"
                                    class="block w-full rounded-md border-0 focus:outline-none py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                            @error('location')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-col h-max my-auto">
                        <label for="categories" class="text-white">Choose a category</label>
                        <select required id="categories" name="category_id"
                            class="bg-gray-50 border focus:outline-none border-gray-300 text-gray-900 text-sm rounded-lg border-s-gray-100 dark:border-s-gray-700 border-s-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach ($categories  as $cat)
                                <option @selected($ad->categorie->id == $cat->id ) value="{{ $cat->id }}">
                                    {{ $cat->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                    <div class="flex flex-col h-max my-auto">
                        <label for="status" class="text-white">Condition</label>
                        <select required id="status"  name="status"
                            class="bg-gray-50 border border-gray-300 focus:outline-none text-gray-900 text-sm rounded-lg border-s-gray-100 dark:border-s-gray-700 border-s-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @foreach (['new', 'good', 'used'] as $cat)
                                <option @selected($ad->status == $cat) value="{{ $cat }}">
                                    {{ $cat }}
                                </option>
                            @endforeach
                        </select>
                        @error('status')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <label for="uploadFile1"
                        class="bg-white text-gray-500 font-semibold text-base rounded max-w-md h-52 flex flex-col items-center justify-center cursor-pointer border-2 border-gray-300 border-dashed mx-auto font-[sans-serif]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-11 mb-2 fill-gray-500" viewBox="0 0 32 32">
                            <path
                                d="M23.75 11.044a7.99 7.99 0 0 0-15.5-.009A8 8 0 0 0 9 27h3a1 1 0 0 0 0-2H9a6 6 0 0 1-.035-12 1.038 1.038 0 0 0 1.1-.854 5.991 5.991 0 0 1 11.862 0A1.08 1.08 0 0 0 23 13a6 6 0 0 1 0 12h-3a1 1 0 0 0 0 2h3a8 8 0 0 0 .75-15.956z"
                                data-original="#000000" />
                            <path
                                d="M20.293 19.707a1 1 0 0 0 1.414-1.414l-5-5a1 1 0 0 0-1.414 0l-5 5a1 1 0 0 0 1.414 1.414L15 16.414V29a1 1 0 0 0 2 0V16.414z"
                                data-original="#000000" />
                        </svg>
                        Upload file

                        <input type="file" id='uploadFile1' name="image" class="hidden" />
                        <p class="text-xs font-medium text-gray-400 mt-2">PNG, JPG SVG, WEBP, and GIF are Allowed.</p>
                    </label>
                    @error('image')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6 p-4">
                <button type="submit"
                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Créer</button>
            </div>
        </form>
    </div>
</x-main-layout>
