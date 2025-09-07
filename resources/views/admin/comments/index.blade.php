@extends('layouts.admin')

@section('content')
<div class="container">
    <h2 class="mb-4">All Comments</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>User</th>
                <th>Post</th>
                <th>Comment</th>
                <th>Posted At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($comments as $comment)
                <tr>
                    <td>{{ $comment->user->name }}</td>
                    <td>
                        <a href="{{ route('posts.show', $comment->post) }}" target="_blank">
                            {{ $comment->post->title }}
                        </a>
                    </td>
                    <td>{{ $comment->content }}</td>
                    <td>{{ $comment->created_at->diffForHumans() }}</td>
                    <td>
                        <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" onsubmit="return confirm('Delete this comment?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No comments yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{ $comments->links() }}
</div>
@endsection
