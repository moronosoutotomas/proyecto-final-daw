<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    public function reviews(): HasMany|Book
    {
        return $this->hasMany(Review::class);
    }

    public function editions(): HasMany|Book
    {
        return $this->hasMany(Edition::class);
    }

    public function bookshelves(): BelongsToMany
    {
        return $this->belongsToMany(Bookshelf::class, 'book_bookshelf');
    }
}
