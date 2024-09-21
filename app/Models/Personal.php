<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    use HasFactory;

    // Si deseas especificar la tabla (opcional)
    protected $table = 'personal';

    // Especifica los campos que se pueden llenar masivamente
    protected $fillable = ['nombre', 'apellido', 'rol_id'];

    /**
     * Relación con el modelo Rol.
     */
    public function rol()
    {
        return $this->belongsTo(Roles::class, 'rol_id');
    }
}
