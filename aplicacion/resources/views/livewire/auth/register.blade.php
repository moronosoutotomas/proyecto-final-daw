<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')]
class extends Component {
	public string $name = '';
	public string $email = '';
	public string $password = '';
	public string $password_confirmation = '';

	/**
	 * Manejar el registro de nuevos usuarios.
	 */
	public function register(): void
	{

		$validated = $this->validate([
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

		event(new Registered(($user = User::create($validated))));

		// asignamos rol por defecto
		$user->assignRole('lector');

		Auth::login($user);

		$this->redirectIntended(route('home', absolute: false), navigate: true);
	}
}; ?>

<div class="flex flex-col gap-6">
	<div class="flex flex-col space-y-2 text-center">
		<flux:heading size="xl" class="text-2xl font-semibold tracking-tight">
			Crear conta
		</flux:heading>
		<flux:subheading class="text-sm text-zinc-600 dark:text-zinc-400">
			Únete á nosa comunidade de lectores
		</flux:subheading>
	</div>

	<!-- Session Status -->
	<x-auth-session-status class="text-center" :status="session('status')"/>

	<form method="POST" wire:submit="register" class="flex flex-col gap-4">
		@csrf

		<!-- name -->
		<flux:input
			wire:model="name"
			label="Nome completo"
			type="text"
			required
			autofocus
			autocomplete="name"
			placeholder="O teu nome completo"
		/>

		<!-- email -->
		<flux:input
			wire:model="email"
			label="Correo electrónico"
			type="email"
			required
			autocomplete="email"
			placeholder="correo@exemplo.com"
		/>

		<!-- password -->
		<flux:input
			wire:model="password"
			label="Contrasinal"
			type="password"
			required
			autocomplete="new-password"
			placeholder="Mínimo 8 caracteres"
			viewable
		/>

		<!-- confirm password -->
		<flux:input
			wire:model="password_confirmation"
			label="Confirmar contrasinal"
			type="password"
			required
			autocomplete="new-password"
			placeholder="Repite o teu contrasinal"
			viewable
		/>

		<flux:button type="submit" variant="primary" class="w-full mt-2">
			Rexistrarse
		</flux:button>
	</form>

	<div class="text-center text-sm text-zinc-600 dark:text-zinc-400">
		Xa tes unha conta?
		<flux:link :href="route('login')" wire:navigate
							 class="font-medium text-zinc-900 dark:text-zinc-100 hover:underline">
			Inicia sesión
		</flux:link>
	</div>
</div>
