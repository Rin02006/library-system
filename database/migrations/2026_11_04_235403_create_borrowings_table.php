<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('borrowings', function (Blueprint $table) {
            $table->id();
            // Links to the users table
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            // Links to the books table
            $table->foreignId('book_id')->constrained()->onDelete('cascade');
            $table->dateTime('borrowed_at');
            $table->dateTime('returned_at')->nullable(); // Null means it hasn't been returned yet
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('borrowings');
    }
};