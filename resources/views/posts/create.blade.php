<x-layout>

    <section class="px-6 py-8">
        <div class="max-w-sm mx-auto border border-gray-200 p-6 rounded-xl">
            <form method="POST" action="/admin/posts">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="title">
                        Title
                    </label>

                    <input class="border border-gray p-2 w-full" type="text" name="title" id="title"
                        value="{{ old('title') }}" required>

                    @error('title')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="slug">
                        Slug
                    </label>

                    <input class="border border-gray p-2 w-full" type="text" name="slug" id="slug"
                        value="{{ old('slug') }}" required>

                    @error('slug')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-2" for="excerpt">
                        Excerpt
                    </label>

                    <textarea class="border border-gray p-2 w-full" type="text" name="excerpt" id="excerpt" required>
                        {{ old('excerpt') }}</textarea>

                    @error('excerpt')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-2" for="body">
                        Body
                    </label>

                    <textarea class="border border-gray p-2 w-full" type="text" name="body" id="body" required> {{ old('body') }}</textarea>

                    @error('body')
                        <p class="text-red-500 text-xs mt-1">value="{{ old('body') }}"</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700 mt-2" for="category">
                        Category
                    </label>

                    <select class="mr-4 order border-purple-500 text-purple-800 bg-purple-200 rounded-full p-1"
                        name="category_id" id="category_id">
                        @foreach (\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') === $category->id ? 'selected' : '' }}>
                                {{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>

                    @error('category_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <x-submit-button>Publish it!</x-submit-button>
            </form>
        </div>
    </section>

</x-layout>
