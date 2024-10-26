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
        Schema::create('dias_semana_cultural', function (Blueprint $table) {
            $table->id();
            $table->string('dia'); // Campo para almacenar el día (ej. 'Lunes', 'Martes')
            $table->date('fecha'); // Campo para almacenar la fecha específica
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dias_semana_cultural');
    }
};