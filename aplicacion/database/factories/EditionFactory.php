<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Edition;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Edition>
 */
class EditionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $books = Book::all()->count();

        return [
            'book_id' => fake()->numberBetween(1, $books),
            'genre' => fake()->word(),
            'summary' => fake()->paragraph(),
            'edition' => fake()->sentence(),
            'edition_date' => fake()->dateTime(),
            'cover_path' => 'empty',
            'pages' => fake()->numberBetween(10, 1600),
            'language' => fake()->languageCode(),
            'translator' => fake()->name(),
        ];
    }
}
