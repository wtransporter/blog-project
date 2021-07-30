@props(['post'])

<article class="lg:flex mt-8 border border-transparent hover:border-black hover:border-opacity-5 hover:bg-gray-100 rounded-xl p-6 transition-colors duration-300">
    <div class="flex-1 lg:mr-8">
        <img class="rounded-xl" src="{{ asset('img/image1.jpg') }}" alt="Image 1">
    </div>
    <div class="flex-1 flex flex-col justify-between">
        <header class="mt-8 lg:mt-0">
            <x-category-button :category="$post->category" />
        </header>
        <div class="text-3xl mt-4">
            <h1>
                {{ $post->title }}
            </h1>
            <span class="block text-xs text-gray-400 mt-2">
                Published <time>{{ $post->created_at->diffForHumans() }}</time>
            </span>
        </div>
        <div class="text-sm mt-2">
            {!! $post->excerpt !!}
        </div>
        <div class="flex items-center mt-8 justify-between">
            <div class="flex items-center space-x-2">
                <img class="h-16 rounded-md" src="{{ asset('img/avatar.png') }}" alt="Avatar">
                <div class="text-sm">
                    <h3 class="font-bold">
                        {{ $post->author->name }}
                    </h3>
                </div>
            </div>
            <a class="text-xs  font-semibold bg-gray-200 px-8 py-2 rounded-full" href="/posts/{{ $post->slug }}">Read More</a>
        </div>
    </div>
</article>