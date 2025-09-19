<x-app-layout>

    <div class="flex flex-col justify-center items-center h-screen bg-blue-70">
        <h1 class="text-4xl font-bold text-center">Welcome to <span class="text-pink-500">DigiNepal</span></h1>
        <h5 class="text-lg mt-2">Let's Explore</h5>
        <a href="{{ route('frontend.blogs.index') }}">
            <button class="bg-pink-500 text-white rounded-lg px-6 py-3 mt-4 hover:bg-pink-600 transition duration-300">
                View Blog
            </button>
        </a>
    </div>


    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Latest Blogs</h1>

        <div class="grid md:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                    <x-post-card :post="$post" />
            @endforeach
        </div>
    </div>

</x-app-layout>