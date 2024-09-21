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
        Schema::create('personal', function (Blueprint $table) {
            $table->id(); // Crea un campo ID autoincrementable
            $table->string('nombre'); // Campo para el nombre
            $table->string('apellido'); // Campo para el apellido
            $table->foreignId('rol_id') // Campo para la relación con roles
                ->constrained('roles') // Especifica la tabla de referencia
                ->onDelete('cascade'); // Opcional: elimina el personal si se elimina el rol
            $table->timestamps(); // Campos created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal'); // Elimina la tabla si existe
    }
};
