@props(['post'])

<article {{ $attributes->merge(['class' => 'border border-transparent hover:border-black hover:border-opacity-5 bg-gray-100 rounded-xl p-3 transition-colors duration-300']) }}>
    <div class="flex-1 flex items-center">
        <img class="rounded-xl mr-2 object-cover h-14 w-14" src="{{ asset($post->image ? 'storage/'.$post->image : 'img/image4.png') }}" alt="Image 4" width="60" height="60">
        <header class="leading-4 w-full">
            <a href="/posts/{{ $post->slug }}" class="block hover:underline text-sm font-semibold">
                {{ $post->title }}
            </a>
            <small class="text-xs text-gray-400 mt-1">Published {{ $post->created_at->diffForHumans() }}</small>
        </header>
    </div>
    <div class="flex items-center mt-2 justify-between border-t border-gray-200 pt-2">
        <div class="flex items-center space-x-2">
            <img class="rounded-full" src="https://i.pravatar.cc/30?u={{ $post->author->id }}" alt="Avatar" width="30" height="30">
            <h3 class="text-xs">
                <a class="font-semibold hover:text-blue-500" href="/?author={{ $post->author->username }}">{{ $post->author->name }}</a>
            </h3>
        </div>
        <x-category-button :category="$post->category" />
    </div>
</article>