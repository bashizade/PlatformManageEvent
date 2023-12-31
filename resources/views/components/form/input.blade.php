<div class="mb-6">
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}
        <input type="{{ $type }}" name="{{ $name }}" class="bg-gray-50 mt-1 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ old($name) ?? $slot }}" placeholder="{{ $placeholder }}" dir="rtl" {{ $option }}>
    </label>
</div>
