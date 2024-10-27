<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diassemanacultural extends Model
{
    use HasFactory;

    protected $table = 'diassemanacultural';
    protected $fillable = [
        'dia',
        'fecha',
    ];
}
