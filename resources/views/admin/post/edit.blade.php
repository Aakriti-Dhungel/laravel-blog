<x-admin-layout :title="'Edit Post'">

    <body class="bg-gray-100 min-h-screen flex items-center justify-center">

        <div class="bg-white w-full max-w-2xl shadow-md rounded-xl p-8">
            <h1 class="text-2xl font-semibold text-gray-800 mb-6">Edit Post</h1>

            <form action=" {{ route('posts.update', $post->id) }}" method="post" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="block text-gray-700 font-medium mb-1">Title</label>
                    <input type="text" name="title" id="title"
                        value="{{ old('title', $post->title) }}"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 px-4 py-2">
                    @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="body" class="block text-gray-700 font-medium mb-1">Body</label>
                    <textarea name="body" id="body" rows="5"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 px-4 py-2">{{ old('body', $post->body) }}</textarea>
                    @error('body')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="status" class="block text-gray-700 font-medium mb-1">Status</label>
                    <select name="status" id="status"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 px-4 py-2">
                        <option value="draft" {{ old('status', $post->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                        <option value="published" {{ old('status', $post->status) == 'published' ? 'selected' : '' }}>Published</option>
                    </select>
                    @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Categories</label>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach($categories as $category)
                        <label class="flex items-center space-x-2 bg-gray-50 p-2 rounded-lg border hover:bg-gray-100">
                            <input type="checkbox" name="categories[]" value="{{ $category->id }}"
                                class="rounded text-blue-500 focus:ring-blue-400"
                                {{ in_array($category->id, old('categories', $post->categories->pluck('id')->toArray())) ? 'checked' : '' }}>
                            <span class="text-gray-700">{{ $category->name }}</span>
                        </label>
                        @endforeach
                    </div>
                    @error('categories')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-between items-center pt-4">
                    <a href="{{ route('posts.index') }}"
                        class="px-4 py-2 rounded-lg border border-gray-300 text-gray-600 hover:bg-gray-200">
                        Back
                    </a>
                    <button type="submit"
                        class="px-6 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600 focus:ring focus:ring-blue-300">
                        Update
                    </button>
                </div>
            </form>
        </div>

</x-admin-layout>