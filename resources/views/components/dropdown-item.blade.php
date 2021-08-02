@props(['active' => false])

@php
    $classes = 'px-4 py-1 block w-full text-left hover:bg-blue-500 hover:text-white focus:bg-blue-500 focus:text-white';

    if ($active) $classes .= ' bg-blue-500 text-white';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>