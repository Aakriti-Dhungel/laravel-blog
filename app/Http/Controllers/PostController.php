<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function totalPostPerUser()
    {
        $posts = User::withCount('posts')->get();
    }
    public function latestPostWithUserInfo()
    {
        $posts = Post::with('user')  // Eager load the user relationship
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();
        // $posts = Post::with('user')  // Eager load the user relationship
        //     ->latest()                 // Order by created_at descending (latest posts)
        //     ->take(10)                 
        //     ->get();

        // $posts = Post::with(['user:id,name'])  
        //     ->latest()
        //     ->take(10)
        //     ->get();


    }

    public function commentPerPost()
    {
        $posts = Post::withCount('comment')->get();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::paginate(10);
        // return $posts;
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'status' => 'required|in:draft,published',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id', // each selected category must exist
        ]);

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'status' => $request->status,
            'user_id' => auth()->id(),             // if posts belong to users
        ]);

        //  Attach categories (pivot table)
        $post->categories()->sync($request->categories);

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
