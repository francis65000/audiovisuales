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
        Schema::create('medios', function (Blueprint $table) {
            $table->id(); // Crea un campo ID autoincrementable
            $table->string('anio'); // Campo para el nombre
            $table->text('url'); // Campo para el apellido
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medios'); // Elimina la tabla si existe
    }
};
