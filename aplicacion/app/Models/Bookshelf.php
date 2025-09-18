<?php

namespace App\Models;

use Database\Factories\BookshelfFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookshelf extends Model
{
    /** @use HasFactory<BookshelfFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'bookshelf_type_id'
    ];

    //    Relación inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
