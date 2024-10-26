<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_usuario'); // nombre del usuario
            $table->date('fecha');            // fecha del mensaje
            $table->time('hora');             // hora del mensaje
            $table->text('mensaje');          // contenido del mensaje
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chats');
    }
};
