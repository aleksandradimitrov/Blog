
<x-layout>

  @include ('_posts-header')

 <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
   @if (count($currentCategory->posts))
     <x-posts-grid :posts="$currentCategory->posts"/>
   @else
      <p class="text-center">No posts in this category yet. Please check back later</p>
   @endif

</main>
    
</x-layout>
