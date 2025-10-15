@props(['post'])
<div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
    <div class="p-4">
        <h2 class="text-lg font-semibold text-gray-800 mb-2">
            {{ $post->title }}
        </h2>

        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
            {{ Str::limit($post->body, 100) }}
        </p>

        <div class="text-sm text-gray-500 mb-4">
            By: {{ $post->user->name }} 
            | Views: {{ $post->views ?? 0 }} 
            | {{ $post->created_at->format('F d, Y') }}
        </div>
        <a href="{{ route('frontend.blogs.show', $post->slug) }}" 
           class="inline-block px-4 py-2 text-sm font-medium text-white bg-pink-500 rounded-lg hover:bg-pink-600">
            Read More
        </a>
    </div>
</div>
