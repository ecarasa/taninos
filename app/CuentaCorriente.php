<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuentaCorriente extends Model
{
    protected $fillable = ['tipo_movimiento','importe', 'descripcion','proveedor','medio_pago','fecha_vto'];

}
