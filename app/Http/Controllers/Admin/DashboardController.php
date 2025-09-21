<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

    public function dashboard()
    {

        $total_post = Post::count();
        $total_category = Category::count();
        $total_comment = Comment::count();
        // $total_user = User::count();
        $total_users = User::where('role', 'user')->count();
        $total_admins = User::where('role', 'admin')->count();


        // $recent_posts = Post::with(['user','categories'])->latest()->take(5)->get();
        $recent_posts = Post::with(['user', 'categories', 'comments'])->latest()->paginate(5);

        $posts_by_category = Category::withCount('posts')->get();

        $posts_name_labels = $posts_by_category->pluck('name');;
        $posts_count_data = $posts_by_category->pluck('posts_count');

        // $posts = Post::selectRaw('DATE_FORMAT(created_at, "%Y-%m") as month, count(*) as count')
        //             ->groupBy('month')
        //             ->orderBy('month')
        //             ->get();

        $posts = Post::selectRaw('MONTHNAME(created_at) as month, COUNT(*) as count')
            ->groupByRaw('MONTH(created_at), MONTHNAME(created_at)')
            ->orderByRaw('MONTH(created_at)')
            ->get();

        $months_labels = $posts->pluck('month')->toArray();
        $count_data = $posts->pluck('count')->toArray();


        // return $data;
        return view('admin.dashboard', compact('total_post', 'total_category', 'total_comment', 'total_users', 'total_admins', 'recent_posts', 'posts_by_category', 'posts_name_labels', 'posts_count_data', 'months_labels', 'count_data'));
    }
}
