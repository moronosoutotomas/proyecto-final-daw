<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Rutas específicas para administradores del sistema.
| Requieren autenticación, verificación de email y rol de administrador.
|
*/

// ============================================================================
// GESTIÓN DE USUARIOS
// ============================================================================
Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::get('/{user}', [UserController::class, 'show'])->name('show');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('/{user}', [UserController::class, 'update'])->name('update');
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');

    // Acciones específicas de usuarios
    Route::post('/{user}/assign-role', [UserController::class, 'assignRole'])->name('assign-role');
    Route::delete('/{user}/remove-role/{role}', [UserController::class, 'removeRole'])->name('remove-role');
    Route::post('/{user}/toggle-status', [UserController::class, 'toggleStatus'])->name('toggle-status');
});

// ============================================================================
// GESTIÓN DE ROLES Y PERMISOS
// ============================================================================
Route::prefix('roles')->name('roles.')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('index');
    Route::get('/create', [RoleController::class, 'create'])->name('create');
    Route::post('/', [RoleController::class, 'store'])->name('store');
    Route::get('/{role}', [RoleController::class, 'show'])->name('show');
    Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('edit');
    Route::put('/{role}', [RoleController::class, 'update'])->name('update');
    Route::delete('/{role}', [RoleController::class, 'destroy'])->name('destroy');

    // Gestión de permisos
    Route::post('/{role}/assign-permission', [RoleController::class, 'assignPermission'])->name('assign-permission');
    Route::delete('/{role}/remove-permission/{permission}', [RoleController::class, 'removePermission'])->name('remove-permission');
});

// ============================================================================
// ESTADÍSTICAS Y REPORTES
// ============================================================================
Route::prefix('stats')->name('stats.')->group(function () {
    Route::get('/', function () {
        return view('admin.stats.index');
    })->name('index');

    Route::get('/users', function () {
        return view('admin.stats.users');
    })->name('users');

    Route::get('/books', function () {
        return view('admin.stats.books');
    })->name('books');

    Route::get('/reviews', function () {
        return view('admin.stats.reviews');
    })->name('reviews');
});
