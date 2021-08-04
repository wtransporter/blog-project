@props(['comment'])
<x-card-panel>
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?u={{ $comment->user_id }}" alt="" class="rounded-xl" width="60" height="60">
        </div>
        <div class="space-y-4">
            <header>
                <h3 class="font-semibold">{{ $comment->author->username }}</h3>
                <p class="text-xs">
                    Posted <time>{{ $comment->created_at->format('F j, Y, G:i') }}</time>
                </p>
            </header>
            <p>
                {{ $comment->body }}
            </p>
        </div>
    </article>
</x-card-panel>