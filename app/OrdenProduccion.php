<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenProduccion extends Model
{
    protected $table = 'orden_produccion';
    protected $fillable = [
        'id', 'consecutivo', 'id_dieta', 'consecutivo_dieta',
        'cantidad_baches', 'created_at', 'updated_at'
    ];
}
