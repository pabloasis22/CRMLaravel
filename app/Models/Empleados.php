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
        'puesto_id',
        'fecha_contratacion',
        'salario',
        'estado',
    ];

    protected $casts = [
        'fecha_contratacion' => 'date',
        'salario' => 'decimal:2',
    ];

    public $timestamps = true;

    public function puesto()
    {
        return $this->belongsTo(Puestos::class, 'puesto_id');
    }
}
