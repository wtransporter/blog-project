<a {{ $attributes->merge(['class' => 'uppercase text-xs font-semibold bg-blue-500 hover:bg-blue-600 transition ease-in duration-150 text-white px-8 py-2 rounded-full']) }}>
    {{ $slot }}
</a>