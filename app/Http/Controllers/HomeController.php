<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function home()
    {
        $posts = Post::where('status', 'published')->latest()->paginate(9);
        return view('home', compact('posts'));
    }
    public function index()
    {
        $posts = Post::where('status', 'published')->latest()->paginate(15);
        return view('frontend.blogs.index', compact('posts'));
    }


    public function show($id)
    {
        $post = Post::where('status', 'published')->findOrFail($id);

        // Handle unique view count using cookie
        $cookie = "post_$id";
        if (!Cookie::get($cookie)) {
            $post->increment('views');
            Cookie::queue(Cookie::make($cookie, $id, 0)); // until browser closes
        }

        return view('frontend.blogs.show', compact('post'));
    }

}
