<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookshelfType extends Model
{
    protected $fillable = [
        'name'
    ];

    protected $table = 'bookshelf_types';

    /**
     * Relaciones
     */
    public function bookshelves()
    {
        return $this->hasMany(Bookshelf::class);
    }
}
