<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Posts</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 min-h-screen flex flex-col items-center">

    <div class="w-full max-w-7xl mx-auto p-6 sm:p-8">

        @if(session('success'))
        <div class="flex justify-between items-center p-4 mb-6 bg-green-100 text-green-700 rounded-lg shadow-md relative">
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

        <h1 class="text-3xl font-bold text-center text-gray-800 mb-4">Blog Posts</h1>

        <div class="text-right mb-6">
            <a href="{{ route('posts.create') }}"
                class="px-6 py-2 bg-blue-500 text-white rounded-xl shadow-md hover:bg-blue-600 transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-400">
                Create Post
            </a>
        </div>

        <form action="{{ route('posts.index') }}" method="GET"
            class="flex flex-wrap items-center gap-4 mb-8 w-full">

            <select name="category"
                class="flex-1 rounded-lg border px-4 py-3 focus:ring-2 focus:ring-blue-400 text-base">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @endforeach
            </select>

            <select name="sort_comments"
                class="flex-1 rounded-lg border px-4 py-3 focus:ring-2 focus:ring-blue-400 text-base">
                <option value="">Sort by Comments</option>
                <option value="asc" {{ request('sort_comments') == 'asc' ? 'selected' : '' }}>Fewest First</option>
                <option value="desc" {{ request('sort_comments') == 'desc' ? 'selected' : '' }}>Most First</option>
            </select>

            <select name="sort_time"
                class="flex-1 rounded-lg border px-4 py-3 focus:ring-2 focus:ring-blue-400 text-base">
                <option value="">Sort by Time</option>
                <option value="asc" {{ request('sort_time') == 'asc' ? 'selected' : '' }}>Oldest First</option>
                <option value="desc" {{ request('sort_time') == 'desc' ? 'selected' : '' }}>Newest First</option>
            </select>

            <input type="search" name="search" placeholder="Search posts..."
                value="{{ request('search') }}"
                class="flex-1 rounded-lg border px-4 py-3 focus:ring-2 focus:ring-blue-400 text-base">

            <button type="submit"
                class="px-6 py-3 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600 transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-400">
                Apply
            </button>
        </form>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts as $post)
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                <h2 class="font-semibold text-xl text-gray-800 mb-3">{{ $post->title }}</h2>
                <p class="text-gray-600 mb-4 line-clamp-3">{{ $post->body }}</p>
                <div class="flex justify-between items-center mt-4">
                    <span class="text-sm text-gray-500">By: {{ $post->user->name }} | {{ $post->created_at->format('F-d-Y') }}</span>
                    <div class="flex space-x-4">
                        <a href="{{ route('posts.edit', $post->id) }}"
                            class="text-green-500 hover:text-green-700 text-sm font-semibold">Edit</a>
                             <a href="{{ route('posts.show', $post->id) }}"
                            class="text-green-700 hover:text-green-700 text-sm font-semibold">View</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline"
                            onsubmit="return confirm('Are you sure you want to delete this post?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="text-red-500 hover:text-red-700 text-sm font-semibold">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12 bg-gray-100 rounded-xl shadow-inner text-gray-600">
                No posts found. Try adjusting filters or create a new post.
            </div>
            @endforelse
        </div>

        <div class="mt-8 flex justify-center">
            {{ $posts->links() }}
        </div>

        @if($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded-lg mt-6 shadow-md">
            <ul class="list-disc pl-6 space-y-1">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <script>
        document.querySelector('.close')?.addEventListener('click', function() {
            this.parentElement.style.display = "none";
        })
    </script>

</body>

</html> -->