<?php

namespace App\Models;

use Database\Factories\ReviewFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /** @use HasFactory<ReviewFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'rating',
        'content',
    ];

//    Relación inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
