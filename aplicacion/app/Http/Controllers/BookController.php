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
        Book::create($request->all());
        return redirect()->route('books.index');
    }

    /**
     * Muestra un libro.
     */
    public function show(Book $book)
    {
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
        # TODO: revisar si funciona con la Request, sinó validar manualmente
        $book->update($request->all());
        $book->save();
        return redirect()->route('books.show', $book);
    }

    /**
     * Elimina un libro de la base de datos.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
