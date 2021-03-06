@props(['post'])

<article class="lg:flex mt-8 border border-transparent hover:border-black hover:border-opacity-5 hover:bg-gray-100 rounded-xl p-6 transition-colors duration-300">
    <div class="flex-1 lg:mr-8">
        <img class="rounded-xl" src="{{ asset($post->image ? 'storage/'.$post->image : 'img/image5.png') }}" alt="Image 1">
    </div>
    <div class="flex-1 flex flex-col justify-between">
        <div>
            <header class="mt-8 lg:mt-0 flex items-center justify-between">
                <x-category-button :category="$post->category" />
                <x-bookmark-button :post="$post" />
            </header>
            <div class="text-3xl mt-4">
                <h1>
                    {{ $post->title }}
                </h1>
                <span class="block text-xs text-gray-400 mt-2">
                    Published <time>{{ $post->created_at->diffForHumans() }}</time>
                </span>
                <span class="text-xs text-gray-400 mt-1 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    {{ $post->views }}
                </span>
            </div>
            <div class="text-sm mt-2">
                {!! $post->excerpt !!}
            </div>
        </div>
        <div class="flex items-center mt-8 justify-between">
            <div class="flex items-center space-x-2">
                <img class="rounded-full" src="https://i.pravatar.cc/50?u={{ $post->author->id }}" alt="Avatar" width="50" height="50">
                <div class="text-sm">
                    <h3>
                        <a class="font-bold hover:text-blue-500" href="/?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                    </h3>
                </div>
            </div>
            <a class="text-xs  font-semibold bg-gray-200 px-8 py-2 rounded-full" href="/posts/{{ $post->slug }}">Read More</a>
        </div>
    </div>
</article>