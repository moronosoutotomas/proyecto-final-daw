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
        'pages',
    ];
}
