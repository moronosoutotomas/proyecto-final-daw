<?php

use Livewire\Volt\Volt;
use App\Models\User;

test('A páxina de perfil pode renderizarse', function () {
    $user = User::factory()->create();
    $user->assignRole('lector');
    $this->actingAs($user);

    $response = $this->get('settings/profile');
    $response->assertOk();
});

test('A información do perfil pode actualizarse', function () {
    $user = User::factory()->create();
    $user->assignRole('lector');

    $this->actingAs($user);

    $response = Volt::test('settings.profile')
        ->set('name', 'Test User')
        ->set('email', 'test@example.com')
        ->call('updateProfileInformation');

    $response->assertHasNoErrors();

    $user->refresh();

    expect($user->name)->toEqual('Test User')
			->and($user->email)->toEqual('test@example.com')
			->and($user->email_verified_at)->toBeNull();
});

/*test('O estado de verificación de email non cambia cando o enderezo de email non cambia', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $response = Volt::test('settings.profile')
        ->set('name', 'Test User')
        ->set('email', $user->email)
        ->call('updateProfileInformation');

    $response->assertHasNoErrors();

    expect($user->refresh()->email_verified_at)->not->toBeNull();
});*/

/*test('O usuario pode eliminar a súa conta', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $response = Volt::test('settings.delete-user-form')
        ->set('password', 'password')
        ->call('deleteUser');

    $response
        ->assertHasNoErrors()
        ->assertRedirect('/');

    expect($user->fresh())->toBeNull()
		->and(auth()->check())->toBeFalse();
});*/

/*test('O contrasinal correcto debe ser proporcionado para eliminar a conta', function () {
    $user = User::factory()->create();

    $this->actingAs($user);

    $response = Volt::test('settings.delete-user-form')
        ->set('password', 'wrong-password')
        ->call('deleteUser');

    $response->assertHasErrors(['password']);

    expect($user->fresh())->not->toBeNull();
});*/
