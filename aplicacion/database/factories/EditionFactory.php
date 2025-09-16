<?php

namespace Database\Factories;

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
        return [
            'genre' => fake()->word(),
            'summary' => fake()->paragraph(),
            'publication_date' => fake()->dateTime(),
            'pages' => fake()->numberBetween(10, 1600),
            'cover_path' => 'empty',
        ];
    }
}
