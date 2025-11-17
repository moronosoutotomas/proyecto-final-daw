<?php

use Livewire\Volt\Component;

new class extends Component {
	public string $theme = 'light';

	public function mount(): void
	{
		$this->theme = auth()->user()->theme ?? 'light';
	}

	public function updateTheme(): void
	{
		$this->validate([
			'theme' => ['required', 'in:light,dark,system'],
		]);

		auth()->user()->update(['theme' => $this->theme]);

		$this->dispatch('theme-updated');
	}
}; ?>

<x-settings.layout heading="Aparencia" subheading="Personaliza como se ve a aplicación">
	<form wire:submit="updateTheme" class="space-y-6">
		<div>
			<label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-4">
				Tema da aplicación
			</label>

			<div class="space-y-3">
				<!-- light -->
				<label
					class="flex items-center p-4 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors {{ $theme === 'light' ? 'bg-amber-50 border-amber-500 dark:bg-amber-900/20 dark:border-amber-500' : '' }}">
					<input type="radio"
								 wire:model.live="theme"
								 value="light"
								 name="theme"
								 class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-gray-300 dark:border-gray-600">
					<div class="ml-3 flex items-center">
						<svg class="h-5 w-5 text-gray-700 dark:text-gray-300 mr-2" fill="none" stroke="currentColor"
								 viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
										d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
						</svg>
						<div>
							<span class="block text-sm font-medium text-gray-900 dark:text-white">Modo claro</span>
							<span class="block text-xs text-gray-500 dark:text-gray-400">Deseño con cores claras</span>
						</div>
					</div>
				</label>

				<!-- dark -->
				<label
					class="flex items-center p-4 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors {{ $theme === 'dark' ? 'bg-amber-50 border-amber-500 dark:bg-amber-900/20 dark:border-amber-500' : '' }}">
					<input type="radio"
								 wire:model.live="theme"
								 value="dark"
								 name="theme"
								 class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-gray-300 dark:border-gray-600">
					<div class="ml-3 flex items-center">
						<svg class="h-5 w-5 text-gray-700 dark:text-gray-300 mr-2" fill="none" stroke="currentColor"
								 viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
										d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
						</svg>
						<div>
							<span class="block text-sm font-medium text-gray-900 dark:text-white">Modo escuro</span>
							<span class="block text-xs text-gray-500 dark:text-gray-400">Deseño con cores escuras</span>
						</div>
					</div>
				</label>

				<!-- system -->
				<label
					class="flex items-center p-4 border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors {{ $theme === 'system' ? 'bg-amber-50 border-amber-500 dark:bg-amber-900/20 dark:border-amber-500' : '' }}">
					<input type="radio"
								 wire:model.live="theme"
								 value="system"
								 name="theme"
								 class="h-4 w-4 text-amber-600 focus:ring-amber-500 border-gray-300 dark:border-gray-600">
					<div class="ml-3 flex items-center">
						<svg class="h-5 w-5 text-gray-700 dark:text-gray-300 mr-2" fill="none" stroke="currentColor"
								 viewBox="0 0 24 24">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
										d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
						</svg>
						<div>
							<span class="block text-sm font-medium text-gray-900 dark:text-white">Usar configuración do sistema</span>
							<span class="block text-xs text-gray-500 dark:text-gray-400">Adáptase ao teu sistema operativo</span>
						</div>
					</div>
				</label>
			</div>
		</div>

		<div class="flex items-center gap-4 pt-4">
			<button type="submit"
							class="px-6 py-2 bg-amber-600 hover:bg-amber-700 text-white font-medium rounded-md shadow-sm transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">
				Gardar preferencia
			</button>

			<x-action-message class="text-sm text-green-600 dark:text-green-400 font-medium" on="theme-updated">
				Tema actualizado.
			</x-action-message>
		</div>
	</form>
</x-settings.layout>
