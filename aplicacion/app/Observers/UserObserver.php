<?php

namespace App\Observers;

use App\Models\Bookshelf;
use App\Models\User;

class UserObserver
{
    /**
     * Crea automáticamente las 3 estanterías default al crear un nuevo usuario.
     */
    public function created(User $user): void
    {
        Bookshelf::create([
            'user_id' => $user->id,
            'bookshelf_type_id' => 1,
            'name' => 'Lidos',
        ]);

        Bookshelf::create([
            'user_id' => $user->id,
            'bookshelf_type_id' => 2,
            'name' => 'Lendo',
        ]);

        Bookshelf::create([
            'user_id' => $user->id,
            'bookshelf_type_id' => 3,
            'name' => 'Pendentes',
        ]);
    }
}
