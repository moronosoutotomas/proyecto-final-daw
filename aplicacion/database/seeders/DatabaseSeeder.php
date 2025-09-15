<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // OJO: este es distinto porque en UserSeeder tenemos un usuario que siempre será el mismo (para hacer login)
//        $this->call([
//            UserSeeder::class,
//        ]);

        $this->call([RoleSeeder::class, BookSeeder::class]);

        User::factory()->create([
            'name' => 'Tomás Moroño',
            'email' => 'tomas@dominio.com',
            'password' => bcrypt('abc123.')
        ])->assignRole('admin');

        User::factory(9)->create();
        Book::factory(50)->create();
    }
}
