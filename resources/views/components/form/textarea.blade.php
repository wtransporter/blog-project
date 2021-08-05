@props(['name', 'rows' => 3])

<label class="block mt-4 uppercase font-semibold text-xs text-gray-700" for="{{ $name }}">
    {{ ucwords($name) }}
</label>

<textarea class="border border-gray-400 focus:border-blue-300 p-2 w-full rounded focus:ring-1 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none"
    type="text" 
    name="{{ $name }}" 
    id="{{ $name }}" 
    rows="{{ $rows }}" 
    required>{{ old($name) }}</textarea>

<x-input-error for="{{ $name }}" />