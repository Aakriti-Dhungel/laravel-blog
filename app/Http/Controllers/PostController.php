<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function index(Request $request)
    {
        $query = Post::with('user', 'categories')->withCount('comments');

        // Search filter
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('body', 'like', "%{$search}%");
            });
        }
        if ($request->filled('category')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('categories.id', $request->category);
            });
        }


        if ($request->filled('sort_comments')) {
            $query->orderBy('comments_count', $request->sort_comments);
        }


        if ($request->filled('sort_time')) {
            $query->orderBy('created_at', $request->sort_time); // asc | desc
        }


        // Paginate the filtered results
        $posts = $query->paginate(10);
        $categories = Category::all();
        return view('post.index', compact('posts', 'categories'));
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
            'categories.*' => 'exists:categories,id',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'status' => $request->status,
            'user_id' => Auth::id(),             // if posts belong to users
        ]);

        //  Attach categories (pivot table)
        $post->categories()->sync($request->categories);

        return redirect()->route('posts.index')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        // return $post;
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $post = Post::findOrFail($id);
        $this->authorizeUser($post);
        $categories = Category::all();

        return view('post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'status' => 'required|in:draft,published',
            'categories' => 'array',
        ]);

        $post = Post::findOrFail($id);
        $this->authorizeUser($post);

        $post->update([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'status' => $request->input('status'),
        ]);

        $post->categories()->sync($request->input('categories', []));

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $post = Post::findOrFail($id);
        $this->authorizeUser($post);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully!');
    }

    public function authorizeUser(Post $post){
        if($post->user_id !== Auth::id()){
            abort(403,'Unauthorized user');
        }
    }
}
