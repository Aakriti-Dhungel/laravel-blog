<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home(Request $request)
    {
        $posts = Post::where('status', 'published')->latest()->take(9)->get();

        if ($request->user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return view('home',compact('posts'));
    }
}
