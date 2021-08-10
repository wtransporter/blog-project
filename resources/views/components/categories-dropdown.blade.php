<x-cat-dropdown>
    <x-slot name="trigger">
        <button class="relative bg-gray-100 py-2 pl-3 pr-9 w-32 rounded-xl felx lg:inline-flex items-center text-sm font-semibold">
            {{ $selectedCategory ? ucwords($selectedCategory->name) : 'Category' }}
            <x-down-arrow class="absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot>

    <x-dropdown-item href="/?{{ http_build_query(request()->except('category', 'page')) }}" :active="empty(request('category'))">
        All
    </x-dropdown-item>
    @foreach ($categories as $category)
        <x-dropdown-item 
            href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
            :active="request('category') === $category->slug"
            class="text-sm"
        >
            {{ ucwords($category->name) }}
        </x-dropdown-item>
    @endforeach
</x-cat-dropdown>