<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('dia'); // campo para el día
            $table->tinyInteger('hora'); // campo para la hora
            $table->text('personal'); // campo de tipo TEXT para permitir mucho texto
            $table->timestamps(); // campos para fecha de creación y actualización
        });
    }

    public function down()
    {
        Schema::dropIfExists('turnos');
    }
};
