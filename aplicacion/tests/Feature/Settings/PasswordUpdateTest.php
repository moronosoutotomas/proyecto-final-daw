<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Volt\Volt;

test('O contrasinal pode editarse', function () {
    $user = User::factory()->create([
        'name' => 'Test',
        'email' => 'test@bookbag.com',
        'password' => bcrypt('abc123.'),
    ]);

    $this->actingAs($user);

    $response = Volt::test('settings.password')
        ->set('current_password', 'abc123.')
        ->set('password', 'new-password')
        ->set('password_confirmation', 'new-password')
        ->call('updatePassword');

    $response->assertHasNoErrors();

    expect(Hash::check('new-password', $user->refresh()->password))->toBeTrue();
});

test('O contrasinal debe ser correcto para ser editado', function () {
    $user = User::factory()->create([
        'name' => 'Test',
        'email' => 'test@bookbag.com',
        'password' => bcrypt('abc123.'),
    ]);

    $this->actingAs($user);

    $response = Volt::test('settings.password')
        ->set('current_password', 'wrong-password')
        ->set('password', 'new-password')
        ->set('password_confirmation', 'new-password')
        ->call('updatePassword');

    $response->assertHasErrors(['current_password']);
});
