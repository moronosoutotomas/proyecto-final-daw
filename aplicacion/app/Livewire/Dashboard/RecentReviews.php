<?php

namespace App\Livewire\Dashboard;

use App\Models\Review;
use Livewire\Component;

class RecentReviews extends Component
{
    public $limit = 4;

    public function mount($limit = 4)
    {
        $this->limit = $limit;
    }

    public function render()
    {
        $reviews = Review::with('book', 'user')->latest()->take($this->limit)->get();

        return view('livewire.dashboard.recent-reviews', [
            'reviews' => $reviews
        ]);
    }
}
