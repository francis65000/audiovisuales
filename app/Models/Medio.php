<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medio extends Model
{
    use HasFactory;

    // Si deseas especificar la tabla (opcional)
    protected $table = 'medios';

    // Especifica los campos que se pueden llenar masivamente
    protected $fillable = ['anio', 'url'];
}
