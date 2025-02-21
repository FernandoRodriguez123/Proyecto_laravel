<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supermercado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'direccion',
        'vigencia_contrato',
        'margen_beneficio',
        'telefono',
        'correo'
    ];
}
