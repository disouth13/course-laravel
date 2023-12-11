<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //product factory
            'nama' => fake()->text(10),
            'categories_id' => fake()->randomDigit(),
            'qty' => fake()->randomDigit(1),
            'harga_jual' => fake()->numberBetween($min = 500, $max = 8000),
            'harga_beli' => fake()->numberBetween($min = 500, $max = 8000),

        ];
    }
}
