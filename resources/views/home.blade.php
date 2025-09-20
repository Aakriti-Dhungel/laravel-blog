<x-app-layout>

    <div class="flex flex-col justify-center items-center 
            min-h-[70vh] sm:min-h-[80vh] md:min-h-screen px-4 py-8 text-center">
        <h1 class="text-4xl font-bold">Welcome to <span class="text-pink-500">DigiNepal</span></h1>
        <h5 class="text-lg mt-2">Let's Explore</h5>
        <a href="{{ route('frontend.blogs.index') }}">
            <button class="bg-pink-500 text-white rounded-lg px-6 py-3 mt-4 hover:bg-pink-600 transition duration-300">
                View Blog
            </button>
        </a>
    </div>


    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
        @foreach ($posts as $post)
        <x-post-card :post="$post" />
        @endforeach
    </div>



</x-app-layout>