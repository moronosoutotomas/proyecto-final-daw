<?php

use App\Models\User;
use Livewire\Volt\Volt;

test('A páxina de rexistro pode renderizarse', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('Os novos usuarios poden rexistrarse', function () {
    $response = Volt::test('auth.register')
		->set('name', 'Test')
		->set('email', 'test@bookbag.com')
		->set('password', 'password')
		->set('password_confirmation', 'password')
		->call('register');

    $response->assertRedirect(route('home', absolute: false));

    $this->assertAuthenticated();
});
