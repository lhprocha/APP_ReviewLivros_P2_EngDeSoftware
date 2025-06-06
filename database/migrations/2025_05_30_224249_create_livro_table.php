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
        Schema::create('livros', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('titulo');
            $table->string('sinopse')->nullable();
            $table->foreignId('autor_id')->constrained('autores')->onDelete('cascade'); // comportamento 5
            $table->foreignId('genero_id')->nullable()->constrained('generos')->nullOnDelete(); // comportamento 4
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livro');
    }
};


