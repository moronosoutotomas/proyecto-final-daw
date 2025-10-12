<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BookshelfType extends Model
{
    protected $fillable = [
        'name'
    ];

    protected $table = 'bookshelf_types';

    /**
     * Relaciones
     */
    public function bookshelves(): BookshelfType|HasMany
    {
        return $this->hasMany(Bookshelf::class);
    }
}
