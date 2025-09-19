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
//        BookshelfType::factory()->create([
//            'id' => 1,
//            'name' => 'leídos'
//        ]);
//
//        BookshelfType::factory()->create([
//            'id' => 2,
//            'name' => 'leyendo'
//        ]);
//
//        BookshelfType::factory()->create([
//            'id' => 3,
//            'name' => 'pendientes'
//        ]);

        $bookshelfType = new BookshelfType();
        $bookshelfType->id = 1;
        $bookshelfType->name = 'leídos';

        $bookshelfType->save();

        $bookshelfType = new BookshelfType();
        $bookshelfType->id = 2;
        $bookshelfType->name = 'leyendo';

        $bookshelfType->save();

        $bookshelfType = new BookshelfType();
        $bookshelfType->id = 3;
        $bookshelfType->name = 'pendientes';

        $bookshelfType->save();
    }
}
