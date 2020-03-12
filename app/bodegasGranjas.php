<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bodegasGranjas extends Model
{
    protected $table = 'bodegasGranjas';
    protected $fillable = [
        'id_bodega', 'id_granja', 'nombre_bodega', 'dieta', 'unidad_medida',
        'capacidad', 'cantidad', 'created_at', 'updated_at'
    ];
}