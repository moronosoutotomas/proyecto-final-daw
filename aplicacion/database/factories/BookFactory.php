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
            'isbn' => fake()->randomNumber(9, true),
            'title' => fake()->sentence(4, false),
            'author' => fake()->name(),
            'genre' => fake()->word(),
            'summary' => fake()->paragraph(),
            'publication_date' => fake()->dateTime(),
            'pages' => fake()->numberBetween(10, 1600),
            'cover_path' => 'empty',
        ];
    }
}
