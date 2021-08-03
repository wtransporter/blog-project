@props(['comment'])

<article class="flex space-x-4 bg-gray-100 p-6 border border-gray-200 rounded-xl">
    <div class="flex-shrink-0">
        <img src="https://picsum.photos/seed/picsum/60/60" alt="" class="rounded-xl" width="60" height="60">
    </div>
    <div class="space-y-4">
        <header>
            <h3 class="font-semibold">{{ $comment->author->name }}</h3>
            <p class="text-xs">
                Posted <time>{{ $comment->created_at->diffForHumans() }}</time>
            </p>
        </header>
        <p>
            {{ $comment->body }}
        </p>
    </div>
</article>