<?php

namespace App\Models;

use App\Observers\PostObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory, Notifiable;
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['title', 'slug', 'body', 'views', 'status', 'user_id'];


    // This function runs automatically when you create or update posts
    protected static function booted()
    {
        static::creating(function ($post) {
            $post->slug = static::generateSlug($post->title);
        });

        static::updating(function ($post) {
            if ($post->isDirty('title')) { //    // Slug regeneration if title changes)
                $post->slug = static::generateSlug($post->title);
            }
        });


        // Register observer for cache clearing
        static::observe(\App\Observers\PostObserver::class);
    }

    // Function to create a unique slug
    protected static function generateSlug($title)
    {
        $slug = Str::slug($title);
        $count = 1;

        while (static::where('slug', $slug)->exists()) {
            $slug = Str::slug($title) . '-' . $count++;
        }

        return $slug;
    }

    // Use slug instead of ID in routes
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    // public function incrementViewsOnce($minutes = 0.5)
    // {
    //     // $cookieName = "post_{$this->id}";
    //     // if (!Cookie::get($cookieName)) {
    //     //     $this->increment('views');
    //     //     Cookie::queue(Cookie::make($cookieName, $this->id, $minutes));
    //     // }

    //     $post = Post::where('status', 'published')->findOrFail($id);

    //     // Handle unique view count using cookie
    //     $cookie = "post_$id";
    //     if (!Cookie::get($cookie)) {
    //         $post->increment('views');
    //         Cookie::queue(Cookie::make($cookie, $id, 0)); // until browser closes
    //     }

    // }

    public function incrementViewsOncePerSession()
    {
        $cookieName = "post_{$this->id}";

        // Check if the cookie exists for this post
        if (!Cookie::get($cookieName)) {
            // Increment views
            $this->increment('views');

            // Set cookie until browser closes
            Cookie::queue(Cookie::make($cookieName, $this->id, 0));
        }
    }
}
