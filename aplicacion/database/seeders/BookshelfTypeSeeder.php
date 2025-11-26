<?php

namespace Database\Seeders;

use App\Models\BookshelfType;
use Illuminate\Database\Seeder;

class BookshelfTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BookshelfType::create([
            'id' => 1,
            'name' => 'lidos',
        ]);

        BookshelfType::create([
            'id' => 2,
            'name' => 'lendo',
        ]);

        BookshelfType::create([
            'id' => 3,
            'name' => 'pendentes',
        ]);
    }
}
