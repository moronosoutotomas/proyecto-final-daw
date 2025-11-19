<?php

use App\Models\User;
use Livewire\Volt\Volt;

test('A páxina de confirmación de contrasinal pode renderizarse', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->get('/confirm-password');

    $response->assertOk();
});

/*test('O contrasinal pode ser confirmado', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $response = Volt::test('auth.confirm-password')
        ->set('password', 'password')
        ->call('confirmPassword');

    $response
        ->assertHasNoErrors()
        ->assertRedirect(route('home', absolute: false));
});*/

/*test('O contrasinal non pode ser confirmado cun contrasinal incorrecto', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $response = Volt::test('auth.confirm-password')
        ->set('password', 'wrong-password')
        ->call('confirmPassword');

    $response->assertHasErrors(['password']);
});*/
