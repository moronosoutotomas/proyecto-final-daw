<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Edition;
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
        $this->call([RoleSeeder::class, BookSeeder::class, EditionSeeder::class]);

        // Usuario administrador
        User::factory()->create([
            'name' => 'Tomás Moroño',
            'email' => 'tomas@dominio.com',
            'password' => bcrypt('abc123.')
        ])->assignRole('administrador');

        // Usuario bibliotecario
        User::factory()->create([
            'name' => 'Bibliotecario User',
            'email' => 'bibliotecario@dominio.com',
            'password' => bcrypt('password')
        ])->assignRole('bibliotecario');

        // Usuarios lectores (8 usuarios)
        User::factory()->count(8)->create()->each(function ($user) {
            $user->assignRole('lector');
        });

        Book::factory(49)->create();
        Edition::factory(19)->create();
        Review::factory(20)->create();

        $this->call([
            BookshelfTypeSeeder::class,
            BookshelfSeeder::class
        ]);
    }
}
