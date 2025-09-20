<x-admin-layout>
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4">Edit Category</h2>

        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium">Name</label>
                <input type="text" name="name" id="name"
                       class="w-full border-gray-300 rounded-lg shadow-sm mt-1"
                       value="{{ old('name', $category->name) }}" required>
                @error('name')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium">Description</label>
                <textarea name="description" id="description" rows="3"
                          class="w-full border-gray-300 rounded-lg shadow-sm mt-1">{{ old('description', $category->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex gap-2">
                <button type="submit"
                        class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                    Update
                </button>
                <a href="{{ route('admin.categories.index') }}"
                   class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>
