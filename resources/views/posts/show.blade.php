<x-layout>

    <main class="max-w-6xl mx-auto mt-16">
        <article class="lg:flex mt-8 px-8">
            <div class="flex-1 lg:mr-8">
                <img class="rounded-xl" src="{{ asset('img/image1.jpg') }}" alt="Image 1">
                <p class="lg:text-center text-xs text-gray-400 mt-2">
                    Published <time>{{ $post->created_at->diffForHumans() }}</time>
                </p>
                <div class="flex lg:justify-center items-center mt-4">
                    <img class="inline-flex h-16 rounded-md mr-2" src="{{ asset('img/avatar.png') }}" alt="Avatar">
                    <div class="text-sm">
                        <h3>
                            <a class="font-bold hover:text-blue-500" href="/?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="flex-1 flex flex-col justify-between">
                <header class="flex justify-between items-center mt-8 lg:mt-0">
                    <a href="/" class="hover:text-blue-500">
                        &lt; &nbsp; Back to Posts</a>
                    <div class="space-x-2">
                        <x-category-button :category="$post->category" />
                    </div>
                </header>
                <div class="text-3xl mt-4">
                    <h1>
                        {{ $post->title }}
                    </h1>
                </div>
                <div class="text-lg mt-2 space-y-4">
                    {!! $post->body !!}
                </div>
            </div>
        </article>
    </main>

</x-layout>