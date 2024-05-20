<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->words(rand(3, 10), true),
            'description' => fake()->words(rand(3, 20), true),
            'price' => rand(100, 350),
            'author' => fake()->name(),
            'img' => fake()->imageUrl(640, 480),
        ];
    }
}
