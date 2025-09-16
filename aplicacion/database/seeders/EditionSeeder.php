<?php

namespace Database\Seeders;

use App\Models\Edition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $edition = new Edition();
        $edition->genre = 'Distopía';
        $edition->summary = 'El personaje principal de la novela es Winston Smith, que trabaja en el Ministerio de la Verdad. Su cometido es reescribir la historia, ironizando así el ideal declarado en el nombre del Ministerio. Tras años trabajando para dicho Ministerio, Winston Smith se va volviendo consciente de que los retoques de la historia en los que consiste su trabajo son solo una parte de la gran farsa en la que se basa su gobierno, y descubre la falsedad intencionada de todas las informaciones procedentes del Partido Único. En su ansia de evadir la omnipresente vigilancia del Gran Hermano (que llega inclusive a todas las casas) encuentra el amor de una joven rebelde llamada Julia, también desengañada del sistema político; ambos encarnan así una resistencia de dos contra una sociedad que se vigila a sí misma.';
        $edition->publication_date = date('d-m-Y', '08061949');
        $edition->pages = '328';
        $edition->cover_path = 'empty';

        $edition->save();
    }
}
