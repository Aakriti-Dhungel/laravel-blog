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


    <div>
        <!-- Chart Post By Category -->
        <div class="p-5 grid grid-cols-2 gap-6">
            <div class="bg-white shadow rounded p-4">
                <h2 class="font-bold text-xl mb-4">Posts by Category</h2>
                <canvas id="postsChart"></canvas>
            </div>
            <div class="bg-white shadow rounded p-4">
                <h2 class="font-bold text-xl mb-4">Users and Admin Roles Distribution</h2>
                <canvas id="usersChart"></canvas>
            </div>
            <div class="bg-white shadow rounded p-4">
                <h2 class="font-bold text-xl mb-4">Posts Per month</h2>
                <canvas id="postsLineChart"></canvas>
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
                        <th class="border border-gray-300 px-4 py-2 text-left">Total Comments</th>
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

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Bar Chart: Posts per Category
            const ctxPosts = document.getElementById('postsChart').getContext('2d');
            const postsChart = new Chart(ctxPosts, {
                type: 'bar',
                data: {
                    labels: @json($posts_name_labels),
                    datasets: [{
                        label: 'Posts per Category',
                        data: @json($posts_count_data),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)'
                        ],
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Number of Posts in Each Category'
                        }
                    }
                }
            });

            // Pie Chart : Users vs Admins
            const ctxUsers = document.getElementById('usersChart').getContext('2d');
            const usersChart = new Chart(ctxUsers, {
                type: 'pie',
                data: {
                    labels: ['Users', 'Admins'],
                    datasets: [{
                        data: @json([$total_users, $total_admins]),
                        backgroundColor: [
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(255, 99, 132, 0.7)'
                        ]
                    }]

                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        },
                        title: {
                            display: true,
                            text: 'User Roles Distribution'
                        }
                    }
                }
            });


            // Line Chart : Posts per month
            const ctxPostsPerMonth = document.getElementById('postsLineChart').getContext('2d');

            const PostsPerMonthChart = new Chart(ctxPostsPerMonth, {
                type: 'line',
                data: {
                    labels: @json($months_labels), // Months
                    datasets: [{
                        label: 'Post Per Month',
                        data: @json($count_data),
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });

        </script>


</x-admin-layout>