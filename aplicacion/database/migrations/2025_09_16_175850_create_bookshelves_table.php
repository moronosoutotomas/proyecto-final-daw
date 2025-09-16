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
        Schema::create('bookshelves', function (Blueprint $table) {
            $table->id()->unique();
            $table->foreignId('user_id')
                ->constrained('users', 'id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('book_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('type');
            $table->foreign('type')
                ->references('id')
                ->on('bookshelf_type')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookshelves');
    }
};
