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
        $this->call([RoleSeeder::class, BookSeeder::class]);

        User::factory()->create([
            'name' => 'Tomás Moroño',
            'email' => 'tomas@dominio.com',
            'password' => bcrypt('abc123.')
        ])->assignRole('administrador');

        User::factory(9)->create();
        Book::factory(49)->create();
        Edition::factory(20)->create();
        Review::factory(20)->create();

        $this->call([
            BookshelfTypeSeeder::class,
            BookshelfSeeder::class
        ]);
    }
}
