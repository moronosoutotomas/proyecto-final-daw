<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookshelfController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

# Página principal de la aplicación
Route::view('homepage', 'homepage')->name('home');
Route::redirect('/', 'homepage')->name('home');

# Rutas públicas
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

# Rutas de gestión de libros (solo administrador y bibliotecario)
Route::middleware(['auth', 'role:administrador|bibliotecario'])->group(function () {
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
});

# Rutas para usuarios autenticados (lector, bibliotecario, administrador)
Route::middleware(['auth', 'role:lector|bibliotecario|administrador'])->group(function () {
    # Rutas de reviews
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

    # Rutas de bookshelves
    Route::post('/bookshelves/{bookshelf}/books', [BookshelfController::class, 'addBook'])->name('bookshelves.addBook');
    Route::delete('/bookshelves/{bookshelf}/books/{book}', [BookshelfController::class, 'removeBook'])->name('bookshelves.removeBook');

    # Rutas de configuración de usuario
    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
