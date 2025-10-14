<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')] class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        // Asignar rol "lector" por defecto a los nuevos usuarios
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
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form method="POST" wire:submit="register" class="flex flex-col gap-4">
        <!-- Name -->
        <flux:input
            wire:model="name"
            label="Nome completo"
            type="text"
            required
            autofocus
            autocomplete="name"
            placeholder="O teu nome completo"
        />

        <!-- Email Address -->
        <flux:input
            wire:model="email"
            label="Correo electrónico"
            type="email"
            required
            autocomplete="email"
            placeholder="correo@exemplo.com"
        />

        <!-- Password -->
        <flux:input
            wire:model="password"
            label="Contrasinal"
            type="password"
            required
            autocomplete="new-password"
            placeholder="Mínimo 8 caracteres"
            viewable
        />

        <!-- Confirm Password -->
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
        <flux:link :href="route('login')" wire:navigate class="font-medium text-zinc-900 dark:text-zinc-100 hover:underline">
            Inicia sesión
        </flux:link>
    </div>
</div>
