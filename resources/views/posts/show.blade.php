<x-layout>

    <main class="max-w-6xl mx-auto mt-16">
        <article class="lg:flex mt-8 px-8">
            <div class="flex-1 lg:mr-8 lg:max-w-xs">
                <img class="rounded-xl" src="{{ asset($post->image ? 'storage/'.$post->image : 'img/image4.png') }}" alt="Image 1">
                <p class="lg:text-center text-xs text-gray-400 mt-2">
                    Published <time>{{ $post->created_at->format('F j, Y, G:i') }}</time>
                </p>
                <div class="flex lg:justify-center items-center mt-4">
                    <img class="inline-flex rounded-full mr-2" src="https://i.pravatar.cc/50?u={{ $post->author->id }}" alt="Avatar" width="50" height="50">
                    <div class="text-sm">
                        <h3>
                            <a class="font-bold hover:text-blue-500" href="/?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                        </h3>
                    </div>
                </div>
                @auth
                    <div class="lg:text-center mt-2">
                        <form action="{{ route('followers.store', $post->user_id) }}" method="POST">
                            @csrf
                            <button type="submit" class="uppercase text-xs font-semibold border px-3 py-1 rounded-full
                                {{ auth()->user()->followers->contains($post->user_id) ? 'border-red-500 text-red-500' : 'border-blue-500 text-blue-500' }}">
                                {{ auth()->user()->followers->contains($post->user_id) ? 'Unfollow' : 'Follow' }}
                            </button>
                        </form>
                    </div>
                @endauth
            </div>
            <div class="flex-1 flex flex-col">
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

        <div class="lg:grid lg:grid-cols-12">
            <section class="mt-8 space-y-4 lg:col-start-5 lg:col-span-8">
                @auth
                    <x-card-panel>
                        <form action="/posts/{{ $post->slug }}/comments" method="POST">
                            @csrf
                            <header class="flex items-center">
                                <img src="https://i.pravatar.cc/50?u={{ auth()->id() }}" alt="" class="rounded-full mr-4" width="50" height="50">
                                <h3>Want to comment ?</h3>
                            </header>

                            <div class="mt-4">
                                <textarea name="body" id="body" rows="5" placeholder="Something in mind ?"
                                    class="border border-blue-300 rounded focus:ring-1 outline-none p-2 w-full" required></textarea>
                                @error('body')
                                    <small class="text-red-700 text-xs mt-2 italic font-semibold">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="flex justify-end">
                                <x-primary-button>
                                    Post
                                </x-primary-button>
                            </div>
                        </form>
                    </x-card-panel>
                @endauth

                @foreach ($post->comments as $comment)
                    <x-post-comment :comment="$comment"/>
                @endforeach
            </section>
        </div>
    </main>

</x-layout>