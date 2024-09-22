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
        
        Schema::create('tareas', function (Blueprint $table) {
            $table->id(); // Crea un campo ID autoincrementable
            $table->string('titulo'); // Campo para el nombre
            $table->text('descripcion'); // Campo para el apellido
            $table->date('fecha'); // Campo para la fecha
            $table->string('estado'); // Estado de la tarea si esta completada o no
            $table->string('categoria'); // Para aplicarle colores
            $table->text('creado_por');
            $table->text('actualizado_por'); 
            $table->timestamps(); // Campos created_at y updated_at
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
        Schema::dropIfExists('tareas'); // Elimina la tabla si existe

    }

};
