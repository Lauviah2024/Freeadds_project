@props([
    'isSelected' => fn($value) => $isSelected($value),
    'label',
    'options',
    'name',
])

<div class="flex flex-col h-max my-auto">
    <label for="status" class="text-white">{{ $label }}</label>
    <select id="status" name="status"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg border-s-gray-100 dark:border-s-gray-700 border-s-2 focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        @foreach ($options as $cat)
            <option {{ $isSelected($cat) ? 'selected' : '' }}>
                {{ $cat }}
            </option>
        @endforeach
    </select>
    @error('status')
        <span class="text-red-500 text-sm">{{ $message }}</span>
    @enderror
</div>
