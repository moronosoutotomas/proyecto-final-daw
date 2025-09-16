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
        $bookshelfType = new BookshelfType();
        $bookshelfType->type = 'read';
        $bookshelfType->save();

        $bookshelfType->type = 'reading';
        $bookshelfType->save();

        $bookshelfType->type = 'pending';
        $bookshelfType->save();
    }
}
