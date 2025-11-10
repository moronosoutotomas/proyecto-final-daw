<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Bookshelf;
use Illuminate\Database\Seeder;

class BookshelfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*$adminBookshelves = Bookshelf::where('user_id', 1)->get();

        if ($adminBookshelves->count() >= 3) {
            $adminBookshelves->where('bookshelf_type_id', 1)->first()?->books()->attach(1);

            if (Book::find(2)) {
                $adminBookshelves->where('bookshelf_type_id', 2)->first()?->books()->attach(2);
            }

            if (Book::find(3)) {
                $adminBookshelves->where('bookshelf_type_id', 3)->first()?->books()->attach([3, 4, 5]);
            }
        }*/
    }
}
