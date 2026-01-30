<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    protected $table = 'empleados';

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'puesto',
        'fecha_contratacion',
        'salario',
        'estado',
    ];

    protected $casts = [
        'fecha_contratacion' => 'date',
        'salario' => 'decimal:2',
    ];

    public $timestamps = true;
}
