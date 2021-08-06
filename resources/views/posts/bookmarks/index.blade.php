<x-layout>

    <section class="max-w-6xl mx-auto">
        <x-card-panel class="mt-8">
            <h1 class="py-10 text-center text-5xl">
                Favorites
            </h1>
        </x-card-panel>
    </section>

    <main class="max-w-6xl mx-auto">
        @if ($posts->count())
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mt-8">
                @foreach ($posts as $post)
                    <x-bookmark-card 
                        :post="$post" 
                    />
                @endforeach
            </div>
            {{ $posts->links() }}
        @else
            <p class="text-center mt-8">No bookmarks yet. Mark some interesting posts.</p>
        @endif
    </main>

</x-layout>