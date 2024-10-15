<x-main-layout>
    <table class="w-[95%] mx-auto divide-y divide-gray-200 table-fixed dark:divide-gray-700">
        <thead class="bg-gray-100 dark:bg-gray-700">
            <tr>
                <th scope="col"
                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Ads Name
                </th>
                <th scope="col"
                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Category
                </th>
                <th scope="col"
                    class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                    Price
                </th>
                <th scope="col" class="p-4">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
            @foreach ($ads as $ad)
                <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $ad->title }}
                    </td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-500 whitespace-nowrap dark:text-white">
                        {{ $ad->categorie->name }}
                    </td>
                    <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        $ {{ $ad->price }}
                    </td>
                    <td class="flex-inline flex justify-end py-4 px-6 text-sm font-medium text-right whitespace-nowrap">
                        <a href="{{ route('ads.edit', $ad) }}" class="text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('ads.destroy', $ad->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="text-red-600 dark:text-red-500 hover:underline cursor-pointer ml-2">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-main-layout>
