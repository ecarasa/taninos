<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->integer("rela_cliente");
            $table->integer("cantidad")->default(null);
            $table->float('importe', 8, 2);	
            $table->integer("estado")->default(1);
            $table->longtext("observaciones")->default(null);
            $table->date("fecha_entrega");
            $table->string("medio_pago");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
