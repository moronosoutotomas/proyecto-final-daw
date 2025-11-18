<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        // Asi aplicaria a al CRUD completo
        // $this->middleware('can:admin.users.index');

        // Asi solo aplica a la ruta index
        // $this->middleware('can:admin.users.index')->only('index');

        // Y asi lo aplicariamos a varios metodos que usen una misma ruta
        // $this->middleware('can:admin.users.edit')->only('edit', 'update');
    }

    /**
     * Mostrar un listado de usuarios.
     */
    public function index(Request $request)
    {
        $query = User::query()->with('roles');

        // filtro por name
        if ($request->filled('name')) {
            $query->where('name', 'like', "%{$request->name}%");
        }

        // filtro por email
        if ($request->filled('email')) {
            $query->where('email', 'like', "%{$request->email}%");
        }

        // filtro por rol
        if ($request->filled('role')) {
            $query->whereHas('roles', function ($roleQuery) use ($request) {
                $roleQuery->where('name', $request->role);
            });
        }

        // filtro por fecha de registro minima
        if ($request->filled('min_date')) {
            $query->where('created_at', '>=', $request->min_date);
        }

        // filtro por fecha de registro maxima
        if ($request->filled('max_date')) {
            $query->where('created_at', '<=', $request->max_date);
        }

        // ordenamiento y sentido
        $order = $request->get('order', 'id');
        $sort = $request->get('sort', 'asc');

        if (! in_array($order, ['name', 'email', 'role', 'created_at'], true)) {
            $order = 'id';
        }

        if (! in_array($sort, ['asc', 'desc'], true)) {
            $sort = 'asc';
        }

        if ($order === 'role') {
            $query->orderByRaw(
                "(
					SELECT roles.name
					FROM model_has_roles mr
						INNER JOIN roles ON roles.id = mr.role_id
					WHERE mr.model_type = ?
						AND mr.model_id = users.id
					LIMIT 1
				) {$sort}", [User::class]
            );
        } else {
            $query->orderBy($order, $sort);
        }

        $roles = Role::all();
        $users = $query->paginate(10)->withQueryString();

        return view('admin.users.index', compact('users', 'roles'));
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
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:30',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:255|confirmed',
        ], [
            'name.required' => 'O nome é obrigatorio.',
            'name.string' => 'O nome debe ser un texto.',
            'name.min' => 'O nome debe ter polo menos :min caracteres.',
            'name.max' => 'O nome non pode ter máis de :max caracteres.',
            'email.required' => 'O email é obrigatorio.',
            'email.string' => 'O email debe ser un texto.',
            'email.email' => 'O email debe ter un formato válido.',
            'email.max' => 'O email non pode ter máis de :max caracteres.',
            'email.unique' => 'Este email xa está rexistrado.',
            'password.required' => 'O contrasinal é obrigatorio.',
            'password.string' => 'O contrasinal debe ser un texto.',
            'password.min' => 'O contrasinal debe ter polo menos :min caracteres.',
            'password.max' => 'O contrasinal non pode ter máis de :max caracteres.',
            'password.confirmed' => 'A confirmación do contrasinal non coincide.',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        User::create($validated);

        return redirect()->route('admin.users.index')
            ->with('success', 'Usuario creado correctamente');
    }

    /**
     * Mostrar los detalles de un usuario.
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

        $validated = $request->validate([
            'name' => 'required|string|min:4|max:30',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:8|max:255|confirmed',
        ], [
            'name.required' => 'O nome é obrigatorio.',
            'name.string' => 'O nome debe ser un texto.',
            'name.min' => 'O nome debe ter polo menos :min caracteres.',
            'name.max' => 'O nome non pode ter máis de :max caracteres.',
            'email.required' => 'O email é obrigatorio.',
            'email.string' => 'O email debe ser un texto.',
            'email.email' => 'O email debe ter un formato válido.',
            'email.max' => 'O email non pode ter máis de :max caracteres.',
            'email.unique' => 'Este email xa está rexistrado.',
            'password.string' => 'O contrasinal debe ser un texto.',
            'password.min' => 'O contrasinal debe ter polo menos :min caracteres.',
            'password.max' => 'O contrasinal non pode ter máis de :max caracteres.',
            'password.confirmed' => 'A confirmación do contrasinal non coincide.',
        ]);

        if (! empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('admin.users.index', $user)
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
