<?php

use App\Models\User;
use Livewire\Volt\Volt as LivewireVolt;

test('A pantalla de login pode renderizarse', function () {
    $response = $this->get('/login');

    $response->assertOk();
});

test('Os usuarios poden iniciar sesión na pantalla de login', function () {
    $user = User::factory()->create([
        'name' => 'Test',
        'email' => 'test@bookbag.com',
        'password' => bcrypt('abc123.'),
    ]);

    $response = LivewireVolt::test('auth.login')
        ->set('email', $user->email)
        ->set('password', 'abc123.')
        ->call('login');

    $response
        ->assertHasNoErrors()
        ->assertRedirect(route('home', absolute: false));

    $this->assertAuthenticated();
});

test('Os usuarios non poden iniciar sesión cun contrasinal incorrecto', function () {
    $user = User::factory()->create([
        'name' => 'Test',
        'email' => 'test@bookbag.com',
        'password' => bcrypt('abc123.'),
    ]);

    $response = LivewireVolt::test('auth.login')
        ->set('email', $user->email)
        ->set('password', 'wrong-password')
        ->call('login');

    $response->assertHasErrors('email');

    $this->assertGuest();
});

test('Os usuarios poden pechar sesión', function () {
    $user = User::factory()->create([
        'name' => 'Test',
        'email' => 'test@bookbag.com',
        'password' => bcrypt('abc123.'),
    ]);

    $response = $this->withoutMiddleware(\Illuminate\Foundation\Http\Middleware\ValidateCsrfToken::class)
        ->actingAs($user)
        ->post('/logout');

    $response->assertRedirect('/');

    $this->assertGuest();
});
