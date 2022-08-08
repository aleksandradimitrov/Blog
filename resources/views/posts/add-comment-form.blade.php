@auth


    <form method="POST" action="/posts/{{ $post->slug }}/comments" class="border border-gray-200 p-6 rounded-xl ">
        @csrf
        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->user()->id }}" alt="40" width="40" height="60"
                class="rounded-xl">
            <h2 class="ml-4">Want to participate {{ auth()->user()->name }}?</h2>
        </header>
        <div class="mt-5 mb-5">
            <textarea name="body" class="w-full text-sm focus:outline-none focus:ring" cols="30" rows="10"
                placeholder="Quick, thing of something to say!" required></textarea>

            @error('body')
                <span class="text-red-500 text-xs">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
            <x-submit-button>Post</x-submit-button>
        </div>
    </form>
@else
    <p class="mb-8">
        <a href="/login"
            class="rounded-full font-mono:Monaco border border-gray-500 py-3 px-3 ml-2 mr-2 mb-6 bg-purple-400 text-white">Log
            in </a>or <a href="/register"
            class="rounded-full font-mono:Monaco border border-gray-500 py-3 px-3 ml-2 mr-2 mb-6 bg-purple-200">Register</a>
        to leave a comment!
    </p>

@endauth
