<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id()->unique();

            $table->integer('isbn')->unique();
            $table->string('title');
            $table->string('author');
            $table->string('genre');
            $table->longText('summary')->nullable();
            $table->timestamp('publication_date')->nullable();
            $table->integer('pages');
            $table->string('cover_path');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
