<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $book = new Book();
        $book->isbn10 = '8499890946';
        $book->isbn13 = '9788499890944';
        $book->title = '1984';
        $book->author = 'George Orwell';
        $book->publication_date = date('d-m-Y', '08061949');

        $book->save();
    }
}
