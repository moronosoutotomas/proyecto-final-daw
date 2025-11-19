<?php

use App\Models\Book;
use App\Models\User;

test('A pantalla de libros pode renderizarse', function () {
	$response = $this->get('/books');
	$response->assertStatus(200);
});

test('Un lector pode acceder a un libro', function () {
	$user = User::factory()->create();
	$user->assignRole('lector');
	$book = Book::factory()->create();

	$response = $this->actingAs($user)->get('/books/' . $book->id);

	$response->assertStatus(200);
});

test('Un bibliotecario pode acceder a un libro', function () {
	$user = User::factory()->create();
	$user->assignRole('bibliotecario');
	$book = Book::factory()->create();

	$response = $this->actingAs($user)->get('/books/' . $book->id);
	$response->assertStatus(200);
});

test('Un bibliotecario pode crear un libro', function () {
	$user = User::factory()->create();
	$user->assignRole('bibliotecario');

	$response = $this->withoutMiddleware(\Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class)
		->actingAs($user)
		->post('/books', [
			'title' => 'Test Book',
			'author' => 'Test Author',
			'publication_date' => '2025-01-01',
			'isbn10' => '1234567890',
			'isbn13' => '1234567890123',
		]);

	$response->assertRedirect(route('books.index'));
});

test('Un bibliotecario pode editar un libro', function () {
	$user = User::factory()->create();
	$user->assignRole('bibliotecario');
	$book = Book::factory()->create();

	$response = $this->withoutMiddleware(\Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class)
		->actingAs($user)
		->put('/books/' . $book->id, [
			'title' => 'Test Book',
			'author' => 'Test Author',
			'publication_date' => '2025-01-01',
			'isbn10' => '1234567890',
			'isbn13' => '1234567890123',
		]);

	$response->assertRedirect(route('books.show', $book));
});

test('Un bibliotecario pode eliminar un libro', function () {
	$user = User::factory()->create();
	$user->assignRole('bibliotecario');
	$book = Book::factory()->create();

	$response = $this->withoutMiddleware(\Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class)
		->actingAs($user)
		->delete('/books/' . $book->id);

	$response->assertRedirect(route('books.index'));
});
