<x-layout>

    <section class="px-6 py-8">
        <div class="max-w-sm mx-auto border border-gray-200 p-6 rounded-xl">
            <form method="POST" action="/admin/posts">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                        Title
                    </label>

                    <input class="border border-gray p-2 w-full" type="text" name="title" id="title" required>

                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-2" for="excerpt">
                            Excerpt
                        </label>

                        <textarea class="border border-gray p-2 w-full" type="text" name="excerpt" id="excerpt" required></textarea>

                        @error('excerpt')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

                        <div class="mb-6">
                            <label class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-2" for="body">
                                Body
                            </label>

                            <textarea class="border border-gray p-2 w-full" type="text" name="body" id="body" required></textarea>

                            @error('body')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <x-submit-button>Publish it!</x-submit-button>
            </form>
        </div>
    </section>

</x-layout>
