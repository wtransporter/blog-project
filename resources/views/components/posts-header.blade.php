<header class="max-w-xl mx-auto mt-16 text-center">
    <h1 class="text-4xl">Latest News</h1>
    <div class="inline-flex mt-2 mr-1 items-center">
        <span class="mr-1">By AUthor</span>
        <img class="h-8 rounded-xl" src="{{ asset('img/avatar.png') }}" alt="Author image">
    </div>
    <p class="text-sm mt-14">
        A utility-first CSS framework packed with classes like flex, pt-4, text-center and rotate-90 that can be composed to build any design, directly in your markup.
    </p>
    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
            <x-dropdown>
                <x-slot name="trigger">
                    <button class="bg-gray-100 py-2 pl-3 pr-9 w-32 rounded-xl felx lg:inline-flex items-center text-sm font-semibold">
                        {{ $selectedCategory ? ucwords($selectedCategory->name) : 'Category' }}
                        <x-down-arrow class="absolute pointer-events-none" style="right: 12px;"/>
                    </button>
                </x-slot>

                <x-dropdown-item href="/" :active="request()->is('/')">
                    All
                </x-dropdown-item>
                @foreach ($categories as $category)
                    <x-dropdown-item 
                        href="/categories/{{ $category->slug }}"
                        :active='request()->is("categories/{$category->slug}")'
                    >
                        {{ ucwords($category->name) }}
                    </x-dropdown-item>
                @endforeach
            </x-dropdown>
        </div>

        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
            <select name="category" id="category" class="flex-1 py-2 pl-3 pr-9 appearance-none bg-transparent text-sm font-semibold">
                <option value="1" disabled selected>Other filter</option>
                <option value="2">Category 1</option>
                <option value="3">Category 2</option>
            </select>
            <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22" height="22" viewBox="0 0 22 22">
                <g fill="none" fill-rule="evenodd">
                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                    </path>
                    <path fill="#222" d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                </g>
            </svg>
        </div>

        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl py-2 px-4">
            <form action="" method="POST">
                <input class="flex lg:inline-flex items-center bg-gray-100 rounded-xl placeholder-black text-sm font-semibold" type="text" placeholder="Search">
            </form>
        </div>
    </div>
</header>