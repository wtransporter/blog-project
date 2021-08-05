@props(['name', 'type' => 'text'])

<label class="block mt-4 uppercase font-semibold text-xs text-gray-700" for="{{ $name }}">
    {{ ucwords($name) }}
</label>

<input class="border border-gray-400 focus:border-blue-300 p-2 w-full rounded focus:ring-1 focus:ring-blue-500 focus:ring-opacity-50 focus:outline-none"
    type="{{ $type }}" 
    name="{{ $name }}" 
    id="{{ $name }}" 
    required 
    value="{{ old($name) }}">

<x-input-error for="{{ $name }}" />