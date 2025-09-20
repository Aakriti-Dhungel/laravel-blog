<x-admin-layout>
    <div class="max-w-2xl mx-auto my-9 bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Create Category</h2>

        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Category Name</label> 
                <input type="text" name="name" id="name"
                       class="w-full border-gray-300 rounded-lg shadow-sm mt-1"
                       value="{{ old('name') }}" required>
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium">Description</label>
                <textarea name="description" id="description" rows="3"
                          class="w-full border-gray-300 rounded-lg shadow-sm mt-1">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-2">
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    Save
                </button>
                <a href="{{ route('admin.categories.index') }}"
                   class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
