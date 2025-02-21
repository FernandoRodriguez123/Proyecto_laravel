<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'categoria',
        'stock',
        'supermercado_id',
        'fecha_caducidad',
        'precio'
    ];

    // Definir la relación con el modelo Supermercado
    public function supermercado()
    {
        return $this->belongsTo(Supermercado::class);
    }
}
