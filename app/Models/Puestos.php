<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Puestos extends Model
{
    protected $table = 'puestos';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    public $timestamps = true;
}
