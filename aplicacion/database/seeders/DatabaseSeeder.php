<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // IMPORTANTE: BookshelfTypeSeeder debe ejecutarse antes de crea un usuario
        // porque UserObserver creará estanterías automáticamente
        $this->call([
            RoleSeeder::class,
            BookshelfTypeSeeder::class,
            BookSeeder::class,
            EditionSeeder::class,
        ]);

        // administrador 1
        User::factory()->create([
            'name' => 'Tomás Moroño',
            'email' => 'tomas@bookbag.com',
            'password' => bcrypt('abc123.'),
        ])->assignRole('administrador');

        // administrador 2
        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'administrador@bookbag.com',
            'password' => bcrypt('abc123.'),
        ])->assignRole('administrador');

        // bibliotecario 3
        User::factory()->create([
            'name' => 'Bibliotecario',
            'email' => 'bibliotecario@bookbag.com',
            'password' => bcrypt('abc123.'),
        ])->assignRole('bibliotecario');

        // lector 4
        User::factory()->create([
            'name' => 'Lector',
            'email' => 'lector@bookbag.com',
            'password' => bcrypt('abc123.'),
        ])->assignRole('lector');

        User::factory()->count(7)->create()->each(function ($user) {
            $user->assignRole('lector');
        });

        Book::factory(40)->create();
        // Edition::factory(19)->create();
        Review::factory(20)->create();

        // BookshelfSeeder añade libros a las estanterías de los usuarios mock
        $this->call([BookshelfSeeder::class]);
    }
}
