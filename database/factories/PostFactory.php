<?php

namespace Database\Factories;

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
            "user_id" => (User::all()->random())->id,
            "title" => fake()->text(25),
            "slug" => fake()->slug(1),
            "picture" => fake()->url(),
            "short_content" => fake()->text(),
            "content" => fake()->text(),
            "comment" => fake()->boolean(),
            "pending" => fake()->boolean(),
            "public" => fake()->boolean(),
            "active" => fake()->boolean()
        ];
    }
}
