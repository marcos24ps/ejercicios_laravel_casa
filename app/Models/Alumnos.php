<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    public $table = 'alumnos';

    public $fillable = [
        'nombre',
        'ciudad'
    ];

    protected $casts = [
        'nombre' => 'string',
        'ciudad' => 'string'
    ];

    public static array $rules = [
        
    ];

    
}
