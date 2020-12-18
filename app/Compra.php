<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{

    protected $fillable = ['rela_producto','cantidad', 'importe','proveedor'];

    public function vino()
    {
    return $this->hasOne('App\Producto', 'id', 'rela_producto');
    }
}
