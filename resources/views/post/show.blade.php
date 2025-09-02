<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $post->title }}</title>
</head>

<body class="bg-gray-100 text-gray-800">

    <div class="w-full min-h-screen bg-white shadow-md p-10">

        <div class="space-y-4 border-b pb-6">
            <h1 class="text-4xl font-bold mb-4 text-gray-900">{{ $post->title }}</h1>

            <p class="text-sm text-gray-600">
                {{ $post->user->name }} . {{ $post->created_at->format('F d, Y') }}
            </p>

            <p class="leading-relaxed text-lg text-gray-700">{{ $post->body }}</p>

            <p>
                <span class="font-semibold text-gray-600">Status:</span>
                <span class="px-3 py-1 rounded-full text-sm
                    @if($post->status === 'published') bg-green-100 text-green-700
                    @elseif($post->status === 'draft') bg-yellow-100 text-yellow-700
                    @else bg-gray-100 text-gray-700 @endif">
                    {{ ucfirst($post->status) }}
                </span>
            </p>
        </div>

        <h2 class="font-bold text-2xl mt-8 mb-4">Comments</h2>

        @forelse ($post->comments as $comment)
            <div class="mb-4 pb-3">
                <strong>{{ $comment->user->name ?? 'Anonymous' }}</strong>
                <span class="text-gray-500 text-sm">
                    {{ $comment->created_at->diffForHumans() }}
                </span>
                <p class="mt-2 text-gray-700">{{ $comment->content }}</p>
            </div>
        @empty
            <p class="text-gray-500">No comments yet. Be the first to comment!</p>
        @endforelse

        @if(auth()->check())
            <form action="{{ route('comments.store', $post) }}" method="POST" class="mt-6">
                @csrf
                <textarea name="content" id="content" rows="3" placeholder="Write your comment..."
                    class="w-full border rounded-lg p-3 mb-3"></textarea>
                <button type="submit"
                    class="text-white font-bold bg-blue-600 hover:bg-blue-700 rounded-lg px-4 py-2">
                    Comment
                </button>
            </form>
        @else
            <p class="text-red-500 mt-4">You must be logged in to comment.</p>
        @endif


        <div class="mt-10">
            <a href="{{ route('posts.index') }}"
                class="inline-block bg-gray-800 hover:bg-gray-900 text-white font-medium px-5 py-2 rounded-lg shadow">
                ← Back to Posts
            </a>
        </div>

    </div>

</body>
</html>
