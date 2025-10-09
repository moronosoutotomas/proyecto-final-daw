<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'isbn10',
        'isbn13',
        'title',
        'author',
        'publication_date',
        'avg_rating'
    ];

    /**
     * Relaciones
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function editions()
    {
        return $this->hasMany(Edition::class);
    }

    public function bookshelves()
    {
        return $this->belongsToMany(Bookshelf::class, 'book_bookshelf');
    }
}
