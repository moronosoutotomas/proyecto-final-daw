<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component {
    public string $name = '';
    public string $email = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($user->id)
            ],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function resendVerificationNotification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }
}; ?>

<x-settings.layout heading="Perfil" subheading="Actualiza tu nombre y dirección de correo electrónico">
        <form wire:submit="updateProfileInformation" class="space-y-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Nombre
                </label>
                <input wire:model="name" 
                       type="text" 
                       id="name"
                       required 
                       autofocus 
                       autocomplete="name"
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500" />
                @error('name') <span class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Correo electrónico
                </label>
                <input wire:model="email" 
                       type="email" 
                       id="email"
                       required 
                       autocomplete="email"
                       class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500" />
                @error('email') <span class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</span> @enderror

                @if (auth()->user() instanceof \Illuminate\Contracts\Auth\MustVerifyEmail &&! auth()->user()->hasVerifiedEmail())
                    <div class="mt-3 p-3 bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-md">
                        <p class="text-sm text-yellow-800 dark:text-yellow-300">
                            Tu correo electrónico no está verificado.
                            <button type="button" wire:click.prevent="resendVerificationNotification" class="underline hover:text-yellow-900 dark:hover:text-yellow-200">
                                Haz click aquí para reenviar el correo de verificación.
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 text-sm font-medium text-green-600 dark:text-green-400">
                                Se ha enviado un nuevo enlace de verificación a tu correo.
                            </p>
                        @endif
                    </div>
                @endif
            </div>

            <div class="flex items-center gap-4 pt-4">
                <button type="submit" 
                        class="px-6 py-2 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-md shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
                    Guardar cambios
                </button>

                <x-action-message class="text-sm text-green-600 dark:text-green-400 font-medium" on="profile-updated">
                    Guardado correctamente.
                </x-action-message>
            </div>
        </form>

        <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-700">
            <livewire:settings.delete-user-form />
        </div>
    </x-settings.layout>
