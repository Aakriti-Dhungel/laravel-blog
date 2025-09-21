<x-admin-layout>
    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Trashed Posts</h1>

        @if(session('success'))
        <div class="flex justify-between items-center p-4 mb-6 bg-green-100 text-green-700 rounded-lg shadow-md relative">
            <span>{{ session('success') }}</span>
            <button type="button" class="close absolute top-4 right-4 text-green-700 hover:text-green-900" onclick="this.parentElement.style.display='none'">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
        @endif

        @if(session('delete'))
        <div class="flex justify-between items-center p-4 mb-6 bg-red-100 text-red-700 rounded-lg shadow-md relative">
            <span>{{ session('delete') }}</span>
            <button type="button" class="close absolute top-4 right-4 text-red-700 hover:text-red-900" onclick="this.parentElement.style.display='none'">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
            </button>
        </div>
        @endif

        <div class="flex justify-end mb-6">
            <a href="{{ route('admin.posts.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                Back
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($posts as $post)
                <div class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg">
                    <h3 class="font-semibold text-lg mb-2 line-clamp-2">{{ $post->title }}</h3>
                    <p class="text-gray-600 mb-3 line-clamp-2 text-sm">{{ Str::limit($post->body, 80) }}</p>
                    
                    <div class="flex justify-between items-center text-xs text-gray-500 mb-3">
                        <span>By {{ $post->user->name }}</span>
                        <span class="text-red-600">{{ $post->deleted_at->diffForHumans() }}</span>
                    </div>
                    
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.posts.restore', $post->id) }}" 
                           class="px-3 py-1 bg-green-100 text-green-700 rounded text-xs hover:bg-green-200"
                           onclick="return confirm('Restore?')">
                            Restore
                        </a>
                        <form action="{{ route('admin.posts.forceDelete', $post->id) }}" method="POST" class="inline">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" class="px-3 py-1 bg-red-100 text-red-700 rounded text-xs hover:bg-red-200"
                                    onclick="return confirm('Permanent delete?')">
                                Delete Permanently
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 bg-gray-50 rounded-lg">
                    <h3 class="text-gray-600 mb-2">No trashed posts</h3>
                    <a href="{{ route('admin.posts.index') }}" class="text-blue-500 hover:underline">View all posts</a>
                </div>
            @endforelse
        </div>

        @if($posts->hasPages())
        <div class="mt-6 flex justify-center">
            {{ $posts->links() }}
        </div>
        @endif
    </div>
</x-admin-layout>