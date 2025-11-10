<?php

namespace App\Models;

use Database\Factories\BookshelfFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Bookshelf extends Model
{
	/** @use HasFactory<BookshelfFactory> */
	use HasFactory;

	protected $fillable = [
		'user_id',
		'bookshelf_type_id',
		'name'
	];

	/**
	 * Relaciones
	 */
	public function user(): BelongsTo
	{
		return $this->belongsTo(User::class);
	}

	public function bookshelfType(): BelongsTo
	{
		return $this->belongsTo(BookshelfType::class);
	}

	public function books(): BelongsToMany
	{
		return $this->belongsToMany(Book::class, 'book_bookshelf');
	}
}
