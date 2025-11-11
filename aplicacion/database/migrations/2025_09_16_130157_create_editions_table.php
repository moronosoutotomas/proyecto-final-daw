<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('editions', function (Blueprint $table) {
			$table->id();
			$table->foreignId('book_id')
				->constrained()
				->onDelete('cascade')
				->onUpdate('cascade');
			$table->string('genre');
			$table->longText('summary')->nullable();
			$table->string('edition');
			$table->timestamp('edition_date')->nullable();
			$table->string('cover_path')->nullable();
			$table->integer('pages')->nullable();
			$table->string('language');
			$table->string('translator')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('editions');
	}
};
