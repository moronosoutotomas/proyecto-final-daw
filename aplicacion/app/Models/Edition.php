<?php

namespace App\Models;

use Database\Factories\EditionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    /** @use HasFactory<EditionFactory> */
    use HasFactory;

    protected $fillable = [
        'book_id',
        'genre',
        'summary',
        'edition',
        'edition_date',
        'cover_path',
        'pages',
        'language',
        'translator'
    ];
}
