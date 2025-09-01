<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>View Blog</title>
</head>

<body class="bg-gray-100 text-gray-800">

    <div class="max-w-3xl mx-auto py-10 px-6">
        <div class="bg-white shadow-md rounded-2xl p-8">

            <div class="space-y-4">
                <h1 class="text-3xl font-bold mb-6 text-gray-900">{{ $post->title }}</h1>

                <p>{{$post->user->name}} | {{ $post->created_at->format('F d, Y') }}</p>
                <p> {{ $post->body }}</p>
                <p><span class="font-semibold text-gray-600">Status:</span>
                    <span class="px-2 py-1 rounded-full text-sm
                        @if($post->status === 'published') bg-green-100 text-green-700
                        @elseif($post->status === 'draft') bg-yellow-100 text-yellow-700
                        @else bg-gray-100 text-gray-700 @endif">
                        {{ $post->status }}
                    </span>
                </p>
            </div>

            <div class="mt-8">
                <a href="{{ route('posts.index') }}"
                    class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-lg shadow">
                    Back to Posts
                </a>
            </div>
        </div>
    </div>

</body>

</html>