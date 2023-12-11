<?php

namespace Database\Factories;

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
            //
            'image' => fake()->imageUrl(360,360, 'animals', true, 'cats'),
            'title' => fake()->sentence(),
            'content' => fake()->paragraphs(2),
        ];
    }
}
