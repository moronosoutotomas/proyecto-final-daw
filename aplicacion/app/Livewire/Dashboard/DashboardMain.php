<?php

namespace App\Livewire\Dashboard;

use App\Models\Book;
use App\Models\Bookshelf;
use App\Models\Review;
use App\Models\User;
use Livewire\Component;

class DashboardMain extends Component
{
    public function render()
    {
        $stats = [
            [
                'title' => 'Total Libros',
                'value' => Book::count(),
                'icon' => 'book-open',
                'color' => [
                    'bg' => 'bg-gradient-to-br from-emerald-400 to-teal-500',
                    'text' => 'text-emerald-100'
                ],
                'description' => 'Colección creciendo',
                'trend' => 'arrow-trending-up'
            ],
            [
                'title' => 'Reseñas',
                'value' => Review::count(),
                'icon' => 'star',
                'color' => [
                    'bg' => 'bg-gradient-to-br from-amber-400 to-orange-500',
                    'text' => 'text-amber-100'
                ],
                'description' => 'Opiniones compartidas',
                'trend' => 'chat-bubble-left-right'
            ],
            [
                'title' => 'Usuarios',
                'value' => User::count(),
                'icon' => 'user-group',
                'color' => [
                    'bg' => 'bg-gradient-to-br from-purple-400 to-indigo-500',
                    'text' => 'text-purple-100'
                ],
                'description' => 'Comunidad activa',
                'trend' => 'users'
            ],
            [
                'title' => 'Estanterías',
                'value' => Bookshelf::count(),
                'icon' => 'archive-box',
                'color' => [
                    'bg' => 'bg-gradient-to-br from-rose-400 to-pink-500',
                    'text' => 'text-rose-100'
                ],
                'description' => 'Organización perfecta',
                'trend' => 'queue-list'
            ]
        ];

        return view('livewire.dashboard.dashboard-main', [
            'stats' => $stats
        ]);
    }
}
