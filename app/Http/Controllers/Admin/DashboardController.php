<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function dashboard(){

        $total_post = Post::count();
        $total_category = Category::count();
        $total_comment = Comment::count();
        // $total_user = User::count();
        $total_users = User::where('role', 'user')->count();
        $total_admins = User::where('role', 'admin')->count();


        // $recent_posts = Post::with(['user','categories'])->latest()->take(5)->get();
        $recent_posts = Post::with(['user','categories','comments'])->latest()->paginate(5);
   
        return view('admin.dashboard',compact('total_post','total_category','total_comment','total_users','total_admins','recent_posts'));
    }
    }
