<x-layout>

    @include ('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if (count($posts))
            <x-posts-grid :posts="$posts" />
        @else
            <p class="text-center">No posts in this category yet. Please check back later</p>
        @endif

    </main>

</x-layout>
