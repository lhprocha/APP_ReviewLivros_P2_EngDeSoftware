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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->tinyInteger('nota')->unsigned(); // 0 a 5
            $table->string('texto')->nullable();
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade'); 
            $table->foreignId('livro_id')->constrained('livros')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
    
};

