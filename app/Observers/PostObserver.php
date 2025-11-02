<?php

namespace App\Observers;

use App\Models\Post;
use App\Notifications\PostPublishedNotification;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Notification;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        if ($post->status === 'published') {
            Notification::route('slack', env('SLACK_WEBHOOK_URL'))
                ->notify(new PostPublishedNotification($post));
        }
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        Cache::forget("post_{$post->slug}");
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        Cache::forget("post_{$post->slug}");
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }
}
