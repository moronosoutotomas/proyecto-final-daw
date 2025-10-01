<?php

namespace App\Livewire\Dashboard;

use App\Models\Book;
use Livewire\Component;

class RecentBooks extends Component
{
    public $limit = 5;

    public function mount($limit = 5)
    {
        $this->limit = $limit;
    }

    public function render()
    {
        $books = Book::latest()->take($this->limit)->get();

        return view('livewire.dashboard.recent-books', [
            'books' => $books
        ]);
    }
}
