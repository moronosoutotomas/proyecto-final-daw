<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Book>
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
            'publication_date' => fake()->dateTime(),
            'avg_rating' => fake()->numberBetween(0, 5)
        ];
    }
}
