<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{


    protected $fillable = ['nombre','telefono', 'direccion','obsrevaciones','fecha_cumple'];
}
