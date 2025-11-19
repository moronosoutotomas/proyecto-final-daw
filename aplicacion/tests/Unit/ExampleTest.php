<?php

use App\Models\Book;
use App\Models\Bookshelf;

test('Se pode crear un libro', function () {
	$book = Book::create([
		'isbn10' => '1234567890',
		'isbn13' => '1234567890123',
		'title' => 'Test Book',
		'author' => 'Test Author',
		'publication_date' => '2025-01-01',
		'avg_rating' => 4,
	]);

	expect($book->exists)->toBeTrue()
		->and($book->isbn10)->toBe('1234567890')
		->and($book->isbn13)->toBe('1234567890123')
		->and($book->title)->toBe('Test Book')
		->and($book->author)->toBe('Test Author')
		->and($book->avg_rating)->toBe(4);
});

test('Se pode actualizar un libro', function () {
	$book = Book::factory()->create([
		'title' => 'Original Title',
		'author' => 'Original Author',
	]);

	$book->update([
		'title' => 'Updated Title',
		'author' => 'Updated Author',
		'avg_rating' => 5,
	]);

	expect($book->fresh()->title)->toBe('Updated Title')
		->and($book->fresh()->author)->toBe('Updated Author')
		->and($book->fresh()->avg_rating)->toBe(5);
});

test('Se pode eliminar un libro', function () {
	$book = Book::factory()->create();

	$bookId = $book->id;
	$book->delete();

	expect(Book::find($bookId))->toBeNull()
		->and($book->exists)->toBeFalse();
});
