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
    public function addBook(Request $request, Bookshelf $bookshelf)
    {
        // Verificar que la estantería pertenece al usuario autenticado
        if ($bookshelf->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'No tienes permiso para modificar esta estantería.');
        }

        // Mas sabe el diablo por viejo que por diablo
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        // Verificar si el libro ya está en la estantería
        if ($bookshelf->books()->where('book_id', $validated['book_id'])->exists()) {
            return redirect()->back()->with('info', 'El libro ya está en esta estantería.');
        }

        $bookshelf->books()->attach($validated['book_id']);

        return redirect()->back()->with('success', 'Libro añadido a la estantería correctamente.');
    }

//    TODO: Versión vieja para añadir libros a estanterías
//    public function addBookToBookshelf($bookshelfID, $bookID)
//    {
//        $user = Auth::user();
//
//        $bookshelf = Bookshelf::where('id', $bookshelfID)
//            ->where('user_id', $user->id)
//            ->firstOrFail();
//
//        $book = Book::findOrFail($bookID);
//
//        if ($bookshelf->books()->where('book_id', $book->id)->exists()) {
//            return back()->with('info', "Lo siento, ese libro ya existe en esta estantería.");
//        }
//
//        $bookshelf->books()->attach($book->id);
//
//        return back()->with('success', "Libro agregado correctamente.");
//    }

    /**
     * Elimina un libro de una estantería del usuario.
     */
    public function removeBook(Bookshelf $bookshelf, Book $book)
    {
        // Verificar que la estantería pertenece al usuario autenticado
        if ($bookshelf->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'No tienes permiso para modificar esta estantería.');
        }

        $bookshelf->books()->detach($book->id);

        return redirect()->back()->with('success', 'Libro eliminado de la estantería correctamente.');
    }
}
