<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Muestra un listado de 10 libros por página por orden alfabético.
     */
    public function index()
    {
        $books = Book::paginate(10);
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
        return view('books.show', compact('book'));
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
