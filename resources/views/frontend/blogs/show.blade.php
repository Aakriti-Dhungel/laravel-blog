<x-app-layout :title="$post->title">

    <div class="w-full mx-auto mt-9 min-h-screen px-4 py-10 bg-gray-100">

        <!-- Post Card -->
        <div class="bg-white shadow-md rounded-lg p-8">
            <h1 class="text-4xl font-bold mb-4 text-gray-900">{{ $post->title }}</h1>

            <p class="text-sm text-gray-500 mb-4">
                By <span class="font-semibold">{{ $post->user->name }}</span>| Views: <span class="font-semibold">{{ $post->views }}</span> | |
                {{ $post->created_at->format('F d, Y') }}
            </p>

            <div class="prose prose-lg text-gray-700 mb-6">
                {!! nl2br(e($post->body)) !!}
            </div>

            @if($post->status === 'published')
            <span class="inline-block px-3 py-1 rounded-full text-sm bg-green-100 text-green-700">
                Published
            </span>
            @elseif($post->status === 'draft')
            <span class="inline-block px-3 py-1 rounded-full text-sm bg-yellow-100 text-yellow-700">
                Draft
            </span>
            @endif
        </div>

        <!-- Comments Section -->
        <div class="mt-10 bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-6">Comments ({{ $post->comments->count() }})</h2>

            @forelse($post->comments as $comment)
            <div class="mb-4 border-b pb-3">
                <p class="text-gray-800 font-semibold">{{ $comment->user->name ?? 'Anonymous' }}
                    <span class="text-gray-500 text-sm">{{ $comment->created_at->diffForHumans() }}</span>
                </p>
                <p class="text-gray-700 mt-1">{{ $comment->content }}</p>
            </div>
            @empty
            <p class="text-gray-500">No comments yet. Be the first to comment!</p>
            @endforelse

            <!-- Comment Form -->
            @auth
            <form action="{{ route('comments.store') }}" method="POST" class="mt-6">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">

                <textarea name="content" rows="4" placeholder="Write your comment..."
                    class="w-full border rounded-lg p-3 mb-3" required></textarea>

                @error('content')
                <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
                @enderror

                <button type="submit"
                    class="bg-blue-600 text-white font-bold px-4 py-2 rounded-lg hover:bg-blue-700">
                    Post Comment
                </button>
            </form>
            @else
            <p class="text-red-500 mt-4">You must be logged in to comment.</p>
            @endauth
        </div>

    </div>

</x-app-layout>