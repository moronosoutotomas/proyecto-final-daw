<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::redirect('/', 'books')->name('home');
//Route::get('/books', [BookController::class, 'index'])->name('books.index');
//Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
Route::resource('books', BookController::class);


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__ . '/auth.php';
