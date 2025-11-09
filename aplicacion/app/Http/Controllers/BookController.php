<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;

class BookController extends Controller
{
	/**
	 * Muestra un listado de 10 libros por página con filtros de búsqueda.
	 */
	public function index(Request $request)
	{
		$query = Book::query();

		// filtro de busqueda por texto independientemente del campo,
		// busca "algo" como lo introducido por el user
//		if ($request->filled('search')) {
//			$search = $request->search;
//			$query->where(function ($q) use ($search) {
//				$q->where('title', 'like', "%{$search}%")
//					->orWhere('author', 'like', "%{$search}%")
//					->orWhere('isbn13', 'like', "%{$search}%");
//			});
//		}

		// filtro por isbn13 (es el que estoy listando, podria hacerse tb con el de 10 char)
		if ($request->filled('isbn13')) {
			$query->where('isbn13', 'like', "%$request->isbn13%");
		}

		// filtro por titulo
		if ($request->filled('title')) {
			$query->where('title', 'like', "%$request->title%");
		}

		// filtro por autor
		if ($request->filled('author')) {
			$query->where('author', 'like', "%$request->author%");
		}

		// filtro por valoracion minima
		if ($request->filled('rating')) {
			$query->where('avg_rating', '>=', $request->rating);
		}

		// ordenamiento y sentido
		$order = $request->get('order');
		$sort = $request->get('sort');

		switch ($order) {
			case 'isbn13':
				$query->orderBy('isbn13', $sort);
				break;
			case 'title':
				$query->orderBy('title', $sort);
				break;
			case 'author':
				$query->orderBy('author', $sort);
				break;
			// TODO: quedaria chulo un calendar con un range para esto
//			case 'publication_date':
//				$query->orderBy('publication_date');
//				break;
			case 'rating':
				$query->orderBy('avg_rating', $sort);
				break;
			default:
				$query->orderBy('id');
		}

		$books = $query->paginate(10)->withQueryString();

		return view('books.index', compact('books'));
	}

	/**
	 * Muestra el formulario de CREACIÓN de un nuevo libro.
	 */
	public function create()
	{
		return view('books.create');
	}

	/**
	 * Almacena un libro en la base de datos.
	 */
	public function store(Request $request)
	{
		$validated = $request->validate([
			'isbn10' => 'nullable|string|min:10|max:10|unique:books,isbn10',
			'isbn13' => 'nullable|string|min:13|max:13|unique:books,isbn13',
			'title' => 'required|string|max:255',
			'author' => 'required|string|max:255',
			'publication_date' => 'nullable|date',
		]);

		Book::create($validated);

		return redirect()->route('books.index')
			->with('success', 'Libro creado correctamente.');
	}

	/**
	 * Muestra un libro.
	 */
	public function show(Book $book)
	{
		$book->load(['reviews.user', 'editions', 'bookshelves']);
		$reviews = Review::all()->where('book_id', '=', $book);

		return view('books.show', compact('book', 'reviews'));
	}

	/**
	 * Muestra el formulario de EDICIÓN de un nuevo libro.
	 */
	public function edit(Book $book)
	{
		return view('books.edit', compact('book'));
	}

	/**
	 * Actualiza un libro ya existente en la base de datos.
	 */
	public function update(Request $request, Book $book)
	{
		$validated = $request->validate([
			'isbn10' => 'nullable|string|min:10|max:10|unique:books,isbn10,' . $book->id,
			'isbn13' => 'nullable|string|min:13|max:13|unique:books,isbn13,' . $book->id,
			'title' => 'required|string|max:255',
			'author' => 'required|string|max:255',
			'publication_date' => 'nullable|date',
		]);

		$book->update($validated);

		return redirect()->route('books.show', $book)
			->with('success', 'Libro actualizado correctamente.');
	}

	/**
	 * Elimina un libro de la base de datos.
	 */
	public function destroy(Book $book)
	{
		$book->delete();
		return redirect()->route('books.index')
			->with('success', 'Libro eliminado correctamente.');
	}
}
