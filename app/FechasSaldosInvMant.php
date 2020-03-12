<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FechasSaldosInvMant extends Model
{
    protected $table = 'fechas_saldos_inv_mantenimiento';
    protected $fillable = ['id', 'fecha', 'id_calendario', 'year', 'mes', 'dia'];
}
