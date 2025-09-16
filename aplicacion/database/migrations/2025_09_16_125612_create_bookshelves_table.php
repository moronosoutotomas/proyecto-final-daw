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
        Schema::create('bookshelf_type', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('type');
            $table->timestamps();
        });

        Schema::create('bookshelves', function (Blueprint $table) {
            $table->id()->unique();
            $table->integer('user_id');
            $table->integer('book_id');
            $table->integer('bookshelf_type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookshelves');
        Schema::dropIfExists('bookshelf_type');
    }
};
