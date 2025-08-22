<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->value('id'),
            // 'category_id' => Category::inRandomOrder()->value('id'), //this will assign through pivot table
            'title' => fake()->sentence(),
            // 'title' => $this->faker->sentence(), //we can do using this also
            'body' => fake()->paragraph(),
        ];
    }
}
