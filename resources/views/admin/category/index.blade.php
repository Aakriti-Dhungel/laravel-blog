<x-admin-layout>
    <div class="max-w-7xl mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Categories</h2>
            <a href="{{ route('admin.categories.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded">Add Category</a>
        </div>

        <!-- @if(session('success'))
            <div class="mb-4 bg-green-100 text-green-700 px-4 py-2 rounded">{{ session('success') }}</div>
        @endif
        @if(session('delete'))
            <div class="mb-4 bg-red-100 text-red-700 px-4 py-2 rounded">{{ session('delete') }}</div>
        @endif -->


        @if(session('success'))
        <div class="alert flex justify-between items-center p-4 mb-6 bg-green-100 text-green-700 rounded-lg shadow-md relative">
            <div>
                <span class="font-semibold">Success!</span>
                <span>{{ session('success') }}</span>
            </div>
            <button type="button" class="close absolute top-4 right-4 text-green-700 hover:text-green-900" aria-label="Close">
                <span class="sr-only">Dismiss</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
        @endif

        @if(session('delete'))
        <div class="alert flex justify-between items-center p-4 mb-6 bg-red-100 text-red-700 rounded-lg shadow-md relative">
            <div>
                <span class="font-semibold">Success!</span>
                <span>{{ session('delete') }}</span>
            </div>
            <button type="button" class="close absolute top-4 right-4 text-red-700 hover:text-red-900" aria-label="Close">
                <span class="sr-only">Dismiss</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
        @endif


        <div class="overflow-x-auto bg-white shadow rounded">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">S.N</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $key => $category)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $key + 1 }}</td>
                        <td class="px-4 py-2">{{ $category->name }}</td>
                        <td class="px-4 py-2">{{ $category->description ?? '-' }}</td>
                        <td class="px-4 py-2 flex gap-2">
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-4 py-4 text-center text-gray-500">No categories found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $categories->links() }}
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.close').click(function() {
                $(this).closest('.alert').hide(); // Hides immediately
            });

            // Auto hide after 5 seconds
            setTimeout(function() {
                $('.alert').hide();
            }, 5000);
        });
    </script>

</x-admin-layout>