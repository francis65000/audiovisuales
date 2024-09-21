<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    // Si deseas especificar la tabla (opcional)
    protected $table = 'roles';

    // Especifica los campos que se pueden llenar masivamente
    protected $fillable = ['rol'];
}
