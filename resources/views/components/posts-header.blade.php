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
    <div class="relative space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        <div class="flex lg:inline-flex items-center bg-gray-100 rounded-xl">
            <x-categories-dropdown />
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