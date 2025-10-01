<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BookshelfController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\EditionController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar las rutas web para tu aplicación. Estas
| rutas son cargadas por el RouteServiceProvider y todas ellas serán
| asignadas al grupo de middleware "web". ¡Haz algo genial!
|
*/

// ============================================================================
// RUTAS PÚBLICAS
// ============================================================================

// Página principal - redirige al dashboard si está autenticado
Route::redirect('/', 'dashboard')->name('home');

// ============================================================================
// RUTAS DE AUTENTICACIÓN
// ============================================================================
require __DIR__ . '/auth.php';

// ============================================================================
// RUTAS PROTEGIDAS (REQUIEREN AUTENTICACIÓN)
// ============================================================================
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard principal
    Route::view('dashboard', 'dashboard')->name('dashboard');

    // ========================================================================
    // GESTIÓN DE LIBROS
    // ========================================================================
    Route::prefix('books')->name('books.')->group(function () {
        Route::get('/', [BookController::class, 'index'])->name('index');
        Route::get('/create', [BookController::class, 'create'])->name('create');
        Route::post('/', [BookController::class, 'store'])->name('store');
        Route::get('/{book}', [BookController::class, 'show'])->name('show');
        Route::get('/{book}/edit', [BookController::class, 'edit'])->name('edit');
        Route::put('/{book}', [BookController::class, 'update'])->name('update');
        Route::delete('/{book}', [BookController::class, 'destroy'])->name('destroy');

        // Rutas anidadas para ediciones
        Route::prefix('{book}/editions')->name('editions.')->group(function () {
            Route::get('/', [EditionController::class, 'index'])->name('index');
            Route::get('/create', [EditionController::class, 'create'])->name('create');
            Route::post('/', [EditionController::class, 'store'])->name('store');
            Route::get('/{edition}', [EditionController::class, 'show'])->name('show');
            Route::get('/{edition}/edit', [EditionController::class, 'edit'])->name('edit');
            Route::put('/{edition}', [EditionController::class, 'update'])->name('update');
            Route::delete('/{edition}', [EditionController::class, 'destroy'])->name('destroy');
        });

        // Rutas anidadas para reseñas
        Route::prefix('{book}/reviews')->name('reviews.')->group(function () {
            Route::get('/', [ReviewController::class, 'index'])->name('index');
            Route::get('/create', [ReviewController::class, 'create'])->name('create');
            Route::post('/', [ReviewController::class, 'store'])->name('store');
            Route::get('/{review}', [ReviewController::class, 'show'])->name('show');
            Route::get('/{review}/edit', [ReviewController::class, 'edit'])->name('edit');
            Route::put('/{review}', [ReviewController::class, 'update'])->name('update');
            Route::delete('/{review}', [ReviewController::class, 'destroy'])->name('destroy');
        });
    });

    // ========================================================================
    // GESTIÓN DE ESTANTERÍAS PERSONALES
    // ========================================================================
    Route::prefix('bookshelves')->name('bookshelves.')->group(function () {
        Route::get('/', [BookshelfController::class, 'index'])->name('index');
        Route::get('/create', [BookshelfController::class, 'create'])->name('create');
        Route::post('/', [BookshelfController::class, 'store'])->name('store');
        Route::get('/{bookshelf}', [BookshelfController::class, 'show'])->name('show');
        Route::get('/{bookshelf}/edit', [BookshelfController::class, 'edit'])->name('edit');
        Route::put('/{bookshelf}', [BookshelfController::class, 'update'])->name('update');
        Route::delete('/{bookshelf}', [BookshelfController::class, 'destroy'])->name('destroy');

        // Acciones específicas de estanterías
        Route::post('/{bookshelf}/add-book', [BookshelfController::class, 'addBook'])->name('add-book');
        Route::delete('/{bookshelf}/remove-book/{book}', [BookshelfController::class, 'removeBook'])->name('remove-book');
    });

    // ========================================================================
    // RESEÑAS INDEPENDIENTES
    // ========================================================================
    Route::prefix('reviews')->name('reviews.')->group(function () {
        Route::get('/', [ReviewController::class, 'index'])->name('index');
        Route::get('/my-reviews', [ReviewController::class, 'myReviews'])->name('my-reviews');
    });

    // ========================================================================
    // CONFIGURACIÓN DE USUARIO
    // ========================================================================
    Route::prefix('settings')->name('settings.')->group(function () {
        Route::redirect('/', 'settings/profile');

        Volt::route('profile', 'settings.profile')->name('profile');
        Volt::route('password', 'settings.password')->name('password');
        Volt::route('appearance', 'settings.appearance')->name('appearance');
    });
});

// ============================================================================
// RUTAS DE ADMINISTRACIÓN (REQUIEREN PERMISOS DE ADMIN)
// ============================================================================
Route::middleware(['auth', 'verified', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(__DIR__ . '/admin.php');
