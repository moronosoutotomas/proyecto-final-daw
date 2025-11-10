<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Bookshelf;
use Illuminate\Http\Request;

class BookshelfController extends Controller
{
	/**
	 * Muestra las estanterías del usuario autenticado.
	 */
	public function index()
	{
		$bookshelves = auth()->user()->bookshelves()->with(['bookshelfType', 'books'])->get();

		return view('bookshelves.index', compact('bookshelves'));
	}

	/**
	 * Añade un libro a una estantería del usuario.
	 */
	public function addBook(Request $request, Bookshelf $bookshelf, Book $book)
	{
		if ($bookshelf->user_id !== $request->user()->id) {
			return back()->with('error', 'Non tes permiso para modificar esta estantería.');
		}

		if ($bookshelf->books()->where('book_id', $book->id)->exists()) {
			return back()->with('info', 'O libro xa está nesta estantería.');
		}

		$bookshelf->books()->attach($book->id);

		return back()->with('success', 'Libro engadido correctamente.');
	}

	/**
	 * Elimina un libro de una estantería del usuario.
	 */
	public function removeBook(Request $request, Bookshelf $bookshelf, Book $book)
	{
		if ($bookshelf->user_id !== $request->user()->id) {
			return back()->with('error', 'Non tes permiso para modificar esta estantería.');
		}

		$bookshelf->books()->detach($book->id);

		return back()->with('success', 'Libro eliminado correctamente.');
	}
}
