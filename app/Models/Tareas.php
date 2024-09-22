<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tareas extends Model
{
    use HasFactory;

    // Definimos la tabla que utiliza este modelo
    protected $table = 'tareas';

    // Campos que pueden ser asignados de forma masiva
    protected $fillable = [
        'titulo',
        'descripcion',
        'fecha',
        'estado',
        'categoria',
        'creado_por',
        'actualizado_por',
    ];
}