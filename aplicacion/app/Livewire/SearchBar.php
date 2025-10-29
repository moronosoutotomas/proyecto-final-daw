<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;

class SearchBar extends Component
{
    public function render()
    {
        $authors = Book::select('author')->distinct()->orderBy('author')->pluck('author');

        return view('livewire.search-bar', [
            'authors' => $authors,
        ]);
    }
}
