<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Posts</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-start">
    <div class="w-full h-full p-4">
        <h1 class="text-2xl font-bold text-center mb-4">Posts</h1>
        @if(session('success'))
        <div class="flex justify-between p-2 bg-green-100 text-green-700 mb-7 ">
            <div>
                <span class="bold">Success!</span>
                <span>{{session('success')}}</span>
            </div>
            <button type="button" class="close ms-auto -mx-1.5 -my-1.5 bg-red-50 text-green-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-2" aria-label="Close">
                <span class="sr-only">Dismiss</span>
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
        @endif


        <div class="text-right mb-4">
            <a href="{{ route('posts.create') }}"
                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Create Post
            </a>
        </div>

            <form action="{{ route('posts.index') }}" method="GET" class="flex ">

                <!-- Category  -->
                <select name="category" class="rounded border px-3 py-2">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>


                <input type="search" name="search" id="search" placeholder="Search..."
                    value="{{ request('search') }}"
                    class="w-full rounded-l border px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded-r hover:bg-blue-600">
                    Search
                </button>


            </form>


        <div class="overflow-x-auto">
            <table class="w-full bg-white shadow-sm hover:shadow-md transition">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-3 py-2">ID</th>
                        <th class="px-3 py-2">Created By</th>
                        <th class="px-3 py-2">Title</th>
                        <th class="px-3 py-2">Body</th>
                        <th class="px-3 py-2">Action</th>

                    </tr>Filter
                </thead>
                <tbody>
                    @foreach($posts as $post)

                    <tr class="bg-gray-200 text-center">
                        <td class="px-3 py-2">{{ $post->id }}</td>
                        <td class="px-3 py-2">{{ $post->user->name }}</td>
                        <td class="px-3 py-2">{{ $post->title }}</td>
                        <td class="px-3 py-2">{{ $post->body }}</td>
                        <td class="px-3 py-2">
                            <a href="{{route('posts.edit', $post->id)}}" class="px-2 py-1 bg-green-500 text-white rounded hover:bg-green-600">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure?')"
                                    class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4 flex justify-center">
            {{ $posts->links() }}
        </div>
    </div>

    @if($errors->any())
    <div>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach

        </ul>
    </div>

    @endif
</body>

<script>
    document.querySelector('.close').addEventListener('click', function() {
        this.parentElement.style.display = "none";
    })
</script>

</html>