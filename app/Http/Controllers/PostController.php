<?php

namespace App\Http\Controllers;

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

    public function commentPerPost(){
        $posts = Post::withCount('comment')->get();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
