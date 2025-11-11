<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component {
	public string $current_password = '';
	public string $password = '';
	public string $password_confirmation = '';

	/**
	 * Update the password for the currently authenticated user.
	 */
	public function updatePassword(): void
	{
		try {
			$validated = $this->validate([
				'current_password' => ['required', 'string', 'current_password'],
				'password' => ['required', 'string', Password::defaults(), 'confirmed'],
			]);
		} catch (ValidationException $e) {
			$this->reset('current_password', 'password', 'password_confirmation');

			throw $e;
		}

		Auth::user()->update([
			'password' => Hash::make($validated['password']),
		]);

		$this->reset('current_password', 'password', 'password_confirmation');

		$this->dispatch('password-updated');
	}
}; ?>

<x-settings.layout heading="Cambiar contrasinal"
									 subheading="Asegúrate de usar unha contrasinal larga e segura para manter a túa conta protexida">
	<form method="POST" wire:submit="updatePassword" class="space-y-6">
		<div>
			<label for="current_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
				Contrasinal actual
			</label>
			<input wire:model="current_password"
						 type="password"
						 id="current_password"
						 required
						 autocomplete="current-password"
						 class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500"/>
			@error('current_password') <span
				class="text-sm text-red-600 dark:text-red-400 mt-1 block">{{ $message }}</span> @enderror
		</div>

		<div>
			<label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
				Novo contrasinal
			</label>
			<input wire:model="password"
						 type="password"
						 id="password"
						 required
						 autocomplete="new-password"
						 class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500"/>
			@error('password') <span class="text-sm text-red-600 dark:text-red-400 mt-1 block">{{ $message }}</span> @enderror
			<p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Mínimo 8 caracteres</p>
		</div>

		<div>
			<label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
				Confirmar novo contrasinal
			</label>
			<input wire:model="password_confirmation"
						 type="password"
						 id="password_confirmation"
						 required
						 autocomplete="new-password"
						 class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-2 focus:ring-amber-500 focus:border-amber-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500"/>
			@error('password_confirmation') <span
				class="text-sm text-red-600 dark:text-red-400 mt-1 block">{{ $message }}</span> @enderror
		</div>

		<div class="flex items-center gap-4 pt-4">
			<button type="submit"
							class="px-6 py-2 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-md shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
				Cambiar contrasinal
			</button>

			<x-action-message class="text-sm text-green-600 dark:text-green-400 font-medium" on="password-updated">
				Contrasinal actualizada.
			</x-action-message>
		</div>
	</form>
</x-settings.layout>
