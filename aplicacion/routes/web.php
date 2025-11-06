<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookshelfController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

# Página principal de la aplicación
Route::view('homepage', 'homepage')->name('home');
Route::redirect('/', 'homepage');

# Rutas públicas estáticas (contact es mock de momento)
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::resource('contact', ContactController::class)->only(['create', 'store']);

# Rutas de gestión de libros (solo administrador y bibliotecario)
Route::middleware(['auth', 'role:administrador|bibliotecario'])->group(function () {
	/*Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
	Route::post('/books', [BookController::class, 'store'])->name('books.store');
	Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
	Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
	Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');*/
	Route::resource('books', BookController::class)->except(['index', 'show']);

});

# Rutas públicas de libros (deben ir después de las específicas como /books/create)
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

# Rutas para usuarios autenticados (lector, bibliotecario, administrador)
Route::middleware(['auth', 'role:lector|bibliotecario|administrador'])->group(function () {
	# Rutas de reviews
	Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
	Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

	# Rutas de bookshelves
	# MENSAJE A QUIEN CORRIGE: Realmente podría tener aqui un ::resource de estanterias sin complicarme ya que a priori no usare
	# post/delete para las propias estanterias, pero quise dejarlo abierto a que una funcion premium permita
	# un crud propio de estanterias por usuario dando mas juego a esta funcion como tal y para ello mejor
	# adelantar acontecimientos y dejarlo asi, aunque de primeras quede raro
	Route::get('/bookshelves', [BookshelfController::class, 'index'])->name('bookshelves.index');
	Route::post('/bookshelves/{bookshelf}/books', [BookshelfController::class, 'addBook'])->name('bookshelves.addBook');
	Route::delete('/bookshelves/{bookshelf}/books/{book}', [BookshelfController::class, 'removeBook'])->name('bookshelves.removeBook');

	# Rutas de configuración de usuario
	Route::redirect('settings', 'settings/profile');
	Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
	Volt::route('settings/password', 'settings.password')->name('settings.password');
	Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
