<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Review>
 */
class ReviewFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
	public function definition(): array
	{
		$users = User::all()->count();
		$books = Book::all()->count();

		return [
			'user_id' => fake()->numberBetween(1, $users),
			'book_id' => fake()->numberBetween(1, $books),
			'rating' => fake()->numberBetween(0, 5),
			'content' => fake()->paragraph()
		];
	}
}
