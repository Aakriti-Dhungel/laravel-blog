<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{


    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:500',
            'post_id' => 'required|exists:posts,id',
        ]);
        Comment::create([
            'content' => $request->content,
            'user_id' => Auth::id(),
            'post_id' => $request->post_id,
        ]);

        return back()->with('success', 'Comment added!');
    }
}
