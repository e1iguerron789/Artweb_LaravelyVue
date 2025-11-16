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
        Schema::create('user_intereses', function (Blueprint $table) {
            $table->id();
    // Relación con usuarios (para saber a quién pertenece este "interés")
    $table->foreignId('user_id')->constrained()->onDelete('cascade');

   
    $table->integer('edad')->nullable();                  // Edad (opcional)
    $table->string('estilo_artistico')->nullable();       // Ej: anime, realismo
    $table->string('fandom_favorito')->nullable();        // Ej: Marvel, Ghibli
    $table->string('nivel_artista')->nullable();          // Ej: principiante,intermedio,avanzado
    $table->text('descripcion')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_intereses');
    }
};
