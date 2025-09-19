<?php

namespace Database\Seeders;

use App\Models\Bookshelf;
use Illuminate\Database\Seeder;

class BookshelfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bookshelf1 = new Bookshelf();
        $bookshelf1->user_id = 1;
        $bookshelf1->book_id = 1;
        $bookshelf1->bookshelf_type_id = 1;

        $bookshelf1->save();

        $bookshelf2 = new Bookshelf();
        $bookshelf2->user_id = 1;
        $bookshelf2->book_id = 2;
        $bookshelf2->bookshelf_type_id = 2;

        $bookshelf2->save();

        $bookshelf3 = new Bookshelf();
        $bookshelf3->user_id = 1;
        $bookshelf3->book_id = 3;
        $bookshelf3->bookshelf_type_id = 3;

        $bookshelf3->save();
    }
}
