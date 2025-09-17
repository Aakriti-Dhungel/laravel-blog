<x-app-layout>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 pt-5 mt-16">
    @forelse($posts as $post)
        <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300">
            <h2 class="font-semibold text-xl text-gray-800 mb-3">{{ $post->title }}</h2>
            <p class="text-gray-600 mb-4 line-clamp-3">{{ $post->body }}</p>
            <div class="flex justify-between items-center mt-4">
                <span class="text-sm text-gray-500">
                    By: {{ $post->user->name }} | <span>Views: {{ $post->views }}</span> |
                    | {{ $post->created_at->format('F d, Y') }}
                </span>
                <a href="{{ route('frontend.blogs.show', $post->id) }}"
                   class="text-blue-500 hover:text-blue-700 text-sm font-semibold">
                   Read More
                </a>
            </div>
        </div>
    @empty
        <div class="col-span-full text-center py-12 bg-gray-100 rounded-xl shadow-inner text-gray-600">
            No posts found. Try again later.
        </div>
    @endforelse

</div>
{{ $posts->links() }}
</x-app-layout>
