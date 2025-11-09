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
		// estaría bien una fn para modificar solamente los roles de un user dado
		// $user->roles()->sync($request->roles);
		// return redirect()->route('admin.users.edit', $user)->with('info', 'Asignáronse ditos roles correctamente.');

		// TODO: revisar, 'email' no puede ser unique porque no podria conservar el que tenia
		$validated = $request->validate([
			'name' => 'required|string|min:2|max:30,',
			'email' => 'required|string|min:4|max:255|unique:users,email,',
			'password' => 'required|string|max:255',
		]);

		$user->update($validated);

		return redirect()->route('admin.users.show', $user)
			->with('success', 'Usuario actualizado correctamente.');
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
