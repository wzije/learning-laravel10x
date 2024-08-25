<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = fake()->name();
        return [
            "title" => $title,
            "slug" =>  Str::slug($title),
            "body" => fake()->text(500),
            "user_id" => rand(1, 5),
            "category_id" => rand(1, 10),
        ];
    }
}
