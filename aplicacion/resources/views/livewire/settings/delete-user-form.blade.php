<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Volt\Component;

new class extends Component {
    public string $password = '';

    /**
     * Delete the currently authenticated user.
     */
    public function deleteUser(Logout $logout): void
    {
        $this->validate([
            'password' => ['required', 'string', 'current_password'],
        ]);

        tap(Auth::user(), $logout(...))->delete();

        $this->redirect('/', navigate: true);
    }
}; ?>

<section class="mt-10 space-y-6">
    <div class="relative mb-5">
        <flux:heading>{{ __('Eliminar conta') }}</flux:heading>
        <flux:subheading>{{ __('Elimina a túa conta e tódo-los seus recursos.') }}</flux:subheading>
    </div>

    <flux:modal.trigger name="confirm-user-deletion">
        <flux:button variant="danger" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
            {{ __('Eliminar conta') }}
        </flux:button>
    </flux:modal.trigger>

    <flux:modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable class="max-w-lg">
        <form method="POST" wire:submit="deleteUser" class="space-y-6">
            @csrf
            @method('DELETE')
            <div>
                <flux:heading size="lg">{{ __('Estás seguro de que queres elimina-la túa conta?') }}</flux:heading>

                <flux:subheading>
                    {{ __('Unha vez sexa eliminada, tódo-los seus recursos serán permanentemente eliminados. Por favor introduce o teu contrasinal para confirmar que queres eliminar permanentemente a túa conta.') }}
                </flux:subheading>
            </div>

            <flux:input wire:model="password" :label="__('Contrasinal')" type="password"/>

            <div class="flex justify-end space-x-2 rtl:space-x-reverse">
                <flux:modal.close>
                    <flux:button variant="filled">{{ __('Cancelar') }}</flux:button>
                </flux:modal.close>

                <flux:button variant="danger" type="submit">{{ __('Eliminar conta') }}</flux:button>
            </div>
        </form>
    </flux:modal>
</section>
