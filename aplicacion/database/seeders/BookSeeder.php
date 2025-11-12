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
        // 10 books que no cambien para asegurar que se ve apropiadamente la primera página del listado
        // y probar el fetching de covers

        // 1984
        $book1 = new Book;
        $book1->isbn10 = '8499890946';
        $book1->isbn13 = '9788499890944';
        $book1->title = '1984';
        $book1->author = 'George Orwell';
        $book1->publication_date = '1949-06-08';
        $book1->avg_rating = 5;
        $book1->save();

        // rebelion en la granja
        $book2 = new Book;
        $book2->isbn10 = '8466362347';
        $book2->isbn13 = '9788499890951';
        $book2->title = 'Rebelion en la granja';
        $book2->author = 'George Orwell';
        $book2->publication_date = '1945-08-17';
        $book2->avg_rating = 5;
        $book2->save();

        // el libro de la selva
        $book3 = new Book;
        $book3->isbn10 = '8425202396';
        $book3->isbn13 = '9788425202391';
        $book3->title = 'El Libro de La Selva';
        $book3->author = 'Rudyard Kipling';
        $book3->publication_date = '1894-01-01';
        $book3->avg_rating = 4;
        $book3->save();

        // el quijote
        $book4 = new Book;
        $book4->isbn10 = '849559403X';
        $book4->isbn13 = '9781587266171';
        $book4->title = 'El ingenioso hidalgo Don Quijote de la Mancha';
        $book4->author = 'Miguel de Cervantes Saavedra';
        $book4->publication_date = '1605-01-01';
        $book4->avg_rating = 4;
        $book4->save();

        // la sombra del viento
        $book5 = new Book;
        $book5->isbn10 = '950491036X';
        $book5->isbn13 = '9789504910367';
        $book5->title = 'La sombra del viento';
        $book5->author = 'Carlos Ruiz Zafón';
        $book5->publication_date = '2001-01-01';
        $book5->avg_rating = 4;
        $book5->save();

        // el hombre invisible
        $book6 = new Book;
        $book6->isbn10 = '0198702671';
        $book6->isbn13 = '0198702671';
        $book6->title = 'El hombre invisible';
        $book6->author = 'H.G. Wells';
        $book6->publication_date = '2017-09-01';
        $book6->avg_rating = 4;
        $book6->save();

        // la maquina del tiempo
        $book7 = new Book;
        $book7->isbn10 = '8418211539';
        $book7->isbn13 = '9788418211539';
        $book7->title = 'La máquina del tiempo';
        $book7->author = 'H.G. Wells';
        $book7->publication_date = '2021-01-01';
        $book7->avg_rating = 4;
        $book7->save();

        // el corsario negro
        $book8 = new Book;
        $book8->isbn10 = '843764254X';
        $book8->isbn13 = '9788437642543';
        $book8->title = 'El corsario negro';
        $book8->author = 'Emilio Salgari';
        $book8->publication_date = '2021-04-29';
        $book8->avg_rating = 4;
        $book8->save();

        // jim boton y lucas el maquinista
        $book9 = new Book;
        $book9->isbn10 = '842790083X';
        $book9->isbn13 = '9788427900837';
        $book9->title = 'Jim Botón y Lucas El Maquinista';
        $book9->author = 'Michael Ende';
        $book9->publication_date = '2009-01-20';
        $book9->avg_rating = 5;
        $book9->save();

        // como entrenar a tu dragon
        $book10 = new Book;
        $book10->isbn10 = '8467505036';
        $book10->isbn13 = '9788467505030';
        $book10->title = 'Como entrenar a tu dragón';
        $book10->author = 'Cressida Cowell';
        $book10->publication_date = '2005-06-16';
        $book10->avg_rating = 5;
        $book10->save();
    }
}
