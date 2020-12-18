<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{

    protected $fillable = ['rela_cliente','cantidad', 'importe','observaciones','fecha_entrega','medio_pago'];
 
    public function cliente()
    {
        return $this->hasOne('App\Cliente', 'id', 'rela_cliente');
    }

    public function articulos()
    {
        return $this->hasMany('App\VentaItem', 'rela_venta', 'id');
    }

}
