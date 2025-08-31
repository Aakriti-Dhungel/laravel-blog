<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // 50 users
        User::factory(50)->create();

        // 10 categories
        $categories = Category::factory(10)->create();

        // 200 posts
        $posts = Post::factory(200)->create();

        Comment::factory(500)->create();

        // Assign 1–3 random categories to each post
        foreach ($posts as $post) {
            $post->categories()->sync(
                $categories->random(rand(1, 3))->pluck('id')->toArray()  // Assign 1–3 random categories to each post using sync() to populate the pivot table
            );
        }
    }
}
