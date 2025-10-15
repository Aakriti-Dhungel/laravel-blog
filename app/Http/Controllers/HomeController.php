<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function home()
    {
        $posts = Post::where('status', 'published')->latest()->take(9)->get();
        return view('home', compact('posts'));
    }
    public function index()
    {
        $posts = Post::where('status', 'published')->latest()->paginate(15);
        return view('frontend.blogs.index', compact('posts'));
    }
    
    public function show(Post $post,$slug)
    {
        $post = Post::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // Handle unique view count using cookie
        // $cookie = "post_$id";
        // if (!Cookie::get($cookie)) {
        //     $post->increment('views');
        //     Cookie::queue(Cookie::make($cookie, $id, 0)); // until browser closes
        // }
        $post->incrementViewsOncePerSession();
        return view('frontend.blogs.show', compact('post'));
    }

    public function about()
    {
        return view('frontend.about-us');
    }
}
