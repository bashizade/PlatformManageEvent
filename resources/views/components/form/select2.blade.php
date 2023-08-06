<div>
    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}

    </label>
    <select name="{{ $name }}[]" multiple="multiple" class="select2" style="width: 100%">
        {{ $slot }}
    </select>
</div>
