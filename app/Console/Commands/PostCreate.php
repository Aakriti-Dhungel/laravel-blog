<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\User;
use Illuminate\Console\Command;

class PostCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:create {--count=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create sample posts into the posts table';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $count = $this->option('count');
        $lastId = Post::latest('id')->first()?->id ?? 0;
        //$userId = User::first()?->id ?? 1; // Default user

        for ($i = 1; $i <= $count; $i++) {
            $tmp = $lastId + $i;
            $randomUser = User::inRandomOrder()->first();
            // dd($randomUser);
            Post::create([
                'user_id' => $randomUser->id,
                'title' => "Sample Post {$tmp}",
                'body' => "This is the body of sample post number {$tmp}.",
                'views' => 0,
                'status' => 'published',
            ]);
        }

        $this->info("{$count} post(s) created successfully!");
    }
}
