<x-dropdown>
    <x-slot name="trigger">
        <button class="bg-gray-100 py-2 pl-3 pr-9 w-32 rounded-xl felx lg:inline-flex items-center text-sm font-semibold">
            {{ $selectedCategory ? ucwords($selectedCategory->name) : 'Category' }}
            <x-down-arrow class="absolute pointer-events-none" style="right: 12px;"/>
        </button>
    </x-slot>

    <x-dropdown-item href="/" :active="empty(request('category'))">
        All
    </x-dropdown-item>
    @foreach ($categories as $category)
        <x-dropdown-item 
            href="/?category={{ $category->slug }}"
            :active="request('category') === $category->slug"
        >
            {{ ucwords($category->name) }}
        </x-dropdown-item>
    @endforeach
</x-dropdown>