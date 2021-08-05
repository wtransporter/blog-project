<header class="max-w-xl mx-auto mt-16 text-center">
    @if ($errors->any())
        <section class="pb-4">
            <p class="text-red-700 text-xs mt-2 p-3 bg-red-200 rounded font-semibold">{{ $errors->first() }}</p>
        </section>
    @endif
    <h1 class="text-5xl font-semibold">Follow Latest News</h1>

    <p class="text-sm mt-14">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras dignissim sagittis luctus. Fusce arcu leo, tempus eu tortor tristique, imperdiet ornare purus. Nam vulputate vehicula aliquet.
    </p>
    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
            <x-categories-dropdown />
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
            <form action="/" method="GET">
                @if (request('category'))
                    <input id="category" name="category" type="hidden" value="{{ request('category') }}">
                @endif
                <input id="search" name="search" 
                    class="flex lg:inline-flex items-center bg-gray-100 rounded-xl placeholder-black text-sm font-semibold" 
                    type="text" placeholder="Search" value="{{ request('search') }}">
            </form>
        </div>
    </div>
</header>