<x-layout>

    <x-posts-header />

    <main class="max-w-6xl mx-auto">
        @if ($posts->count())
            <x-post-featured-card :post="$posts[0]"/>

            <div class="lg:grid lg:grid-cols-6">
                @foreach ($posts->skip(1) as $post)
                    <x-post-card 
                        :post="$post" 
                        class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}"
                    />
                @endforeach
            </div>
            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        @else
            <p class="text-center mt-8">No posts yet. Please check later.</p>
        @endif
    </main>

</x-layout>