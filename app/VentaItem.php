<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VentaItem extends Model
{
    public function vino()
    {
    return $this->hasOne('App\Producto', 'id', 'rela_producto');
    }
}
