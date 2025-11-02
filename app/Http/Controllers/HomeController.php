<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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

    public function show(Post $post, $slug)
    {
        // $post = Post::where('slug', $slug)
        //     ->where('status', 'published')
        //     ->firstOrFail();

        // $post = Cache::remember("post_{$slug}", 60, function () use ($slug) {
        //     return Post::where('slug', $slug)
        //         ->where('status', 'published')
        //         ->firstOrFail();
        // });

        $cacheKey = "post_{$slug}";
        $fromCache = Cache::has($cacheKey);

        // Cache the post for 60 seconds
        $post = Cache::remember($cacheKey, now()->addSeconds(120), function () use ($slug) {
            return Post::where('slug', $slug)
                ->where('status', 'published')
                ->firstOrFail();
        });
        $post->incrementViewsOncePerSession();
        return view('frontend.blogs.show', compact('post'));
    }

    public function about()
    {
        return view('frontend.about-us');
    }
}
