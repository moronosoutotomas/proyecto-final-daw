<?php

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')]
class extends Component {
    /**
     * Send an email verification notification to the user.
     */
    public function sendVerification(): void
    {
        if (Auth::user()->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);

            return;
        }

        Auth::user()->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }

    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<div class="mt-4 flex flex-col gap-6">
    <flux:text class="text-center">
        {{ __('Por favor, verifica o teu correo clicando no enlace que acabamos de enviarte.') }}
    </flux:text>

    @if (session('status') == 'verification-link-sent')
        <flux:text class="text-center font-medium !dark:text-green-400 !text-green-600">
            {{ __('Un novo enlace de verificación foi enviado ó correo que introduciches durante o rexistro.') }}
        </flux:text>
    @endif

    <div class="flex flex-col items-center justify-between space-y-3">
        <flux:button wire:click="sendVerification" variant="primary" class="w-full">
            {{ __('Reenvialo correo de verificación') }}
        </flux:button>

        <flux:link class="text-sm cursor-pointer" wire:click="logout">
            {{ __('Pechar sesión') }}
        </flux:link>
    </div>
</div>
