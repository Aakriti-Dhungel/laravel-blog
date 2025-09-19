<x-app-layout>
    <div class="container mx-auto p-4 pt-20">
    <h1 class="text-2xl font-bold mb-6">All Blogs</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts as $post)
            <x-post-card :post="$post" />
            @empty
            <div class="col-span-full text-center py-12 bg-gray-100 rounded-xl shadow-inner text-gray-600">
                No posts found. Try again later.
            </div>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>