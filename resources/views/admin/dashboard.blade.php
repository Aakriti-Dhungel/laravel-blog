<x-admin-layout>
    <div class="flex space-x-4 p-5">
        <div class="w-1/3 bg-white shadow rounded p-4">
            <h4 class="text-lg font-semibold">Total Post: {{$total_post}}</h4>
        </div>

        <div class="w-1/3 bg-white shadow rounded p-4">
            <h4 class="text-lg font-semibold">Total Category: {{$total_category}}</h4>
        </div>

        <div class="w-1/3 bg-white shadow rounded p-4">
            <h4 class="text-lg font-semibold">Total Comment: {{$total_comment}}</h4>
        </div>
        <div class="w-1/3 bg-white shadow rounded p-4">
            <h4 class="text-lg font-semibold">Total User: {{$total_users}}</h4>
        </div>
        <div class="w-1/3 bg-white shadow rounded p-4">
            <h4 class="text-lg font-semibold">Total Admin: {{$total_admins}}</h4>
        </div>
    </div>

    <div class="p-5">
        <h2 class="font-bold text-2xl mb-4">Latest Posts </h2>
        <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left">Title</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Created By</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Categories</th>
                </tr>
            </thead>

            <tbody>
                @foreach($recent_posts as $post)
                <tr class="hover:bg-gray-50">

                    <td class="border border-gray-300 px-4 py-2">{{$post->title}} </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $post->user->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $post->categories->pluck('name')->implode(', ') }} </td>
                    <td class="border border-gray-300 px-4 py-2">{{ $post->comments->count() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $recent_posts->links() }}



    </div>

</x-admin-layout>