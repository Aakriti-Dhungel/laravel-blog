<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="container mx-auto p-6">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full bg-white border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Post Title</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Post Body</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Created At</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">User Name</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Status</th>
                    </tr>
                </thead>

                <tbody class="text-sm text-gray-700">
                    @foreach($posts as $post)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $post->title }}</td>
                            <td class="px-6 py-4">{{ $post->body }}</td>
                            <td class="px-6 py-4">{{ $post->created_at->format('Y-m-d H:i:s') }}</td>
                            <td class="px-6 py-4">{{ $post->user->name }}</td>
                            <td class="px-6 py-4">{{ $post->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
