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
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->text('description')->nullable();
            $table->string('isbn')->unique()->nullable(); // ISBN pode ser único, mas nem todo livro terá
            $table->integer('page_count')->nullable();
            $table->foreignId('created_by')->constrained('users'); // Quem adicionou o livro ao catálogo
            $table->timestamps();
 
            // Adiciona um índice único para título e autor para evitar duplicação (case insensitive)
            $table->unique(['title', 'author']);
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
    