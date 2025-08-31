<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-start">
    <div class="w-full h-full p-4">
        <h1 class="text-2xl font-bold text-center mb-4">Posts</h1>

        <div class="text-left mb-4">
            <a href="{{ route('posts.create') }}"
                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Create Post
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full bg-white shadow-sm hover:shadow-md transition">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-3 py-2">ID</th>
                        <th class="px-3 py-2">Created By</th>
                        <th class="px-3 py-2">Title</th>
                        <th class="px-3 py-2">Body</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)

                     <tr class="bg-gray-200 text-center">
                        <td class="px-3 py-2">{{ $post->id }}</td>
                        <td class="px-3 py-2">{{ $post->user->name }}</td>
                        <td class="px-3 py-2">{{ $post->title }}</td>
                        <td class="px-3 py-2">{{ $post->body }}</td>
                    </tr>
                    
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4 flex justify-center">
            {{ $posts->links() }}
        </div>
    </div>
</body>

</html>