<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        # Asi aplicaria a al CRUD completo
        #$this->middleware('can:admin.users.index');

        # Asi solo aplica a la ruta index
				// $this->middleware('can:admin.users.index')->only('index');

        # Y asi lo aplicariamos a varios metodos que usen una misma ruta
				// $this->middleware('can:admin.users.edit')->only('edit', 'update');
    }

    /**
     * Mostrar un listado de usuarios.
     */
    public function index()
    {
        $users = User::orderBy('id')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Mostrar el formulario de creación de un usuario.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Almacenar un usuario en la base de datos.
     */
    public function store(Request $request)
    {
        User::create($request->all());
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Mostrar el formulario de edición de un usuario.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Actualizar un usuario de la base de datos.
     */
    public function update(Request $request, User $user)
    {
					// Estaría bien una fn para modificar solamente los roles
//        $user->roles()->sync($request->roles);
//        return redirect()->route('admin.users.edit', $user)->with('info', 'Asignáronse ditos roles correctamente.');

			$validated = $request->validate([
//				'isbn10' => 'nullable|string|min:10|max:10|unique:books,isbn10,' . $book->id,
//				'isbn13' => 'nullable|string|min:13|max:13|unique:books,isbn13,' . $book->id,
//				'title' => 'required|string|max:255',
//				'author' => 'required|string|max:255',
//				'publication_date' => 'nullable|date',
			]);

			$book->update($validated);

			return redirect()->route('books.show', $book)
				->with('success', 'Libro actualizado correctamente.');
    }

    /**
     * Eliminar un usuario de la base de datos.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
