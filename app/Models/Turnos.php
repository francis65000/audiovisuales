<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turnos extends Model
{
    use HasFactory;

    protected $table = 'turnos';

    // Definir los campos que son asignables en masa
    protected $fillable = [
        'dia',
        'hora',
        'personal', // ahora es un campo de tipo TEXT
    ];

    // Definir las reglas de validación
    public static function rules()
    {
        return [
            'dia' => 'required|integer|between:1,5', // entre 1 y 5
            'hora' => 'required|integer|between:1,6', // entre 1 y 6
            'personal' => 'string', // solo requerido y de tipo string, sin límite específico
        ];
    }
}
