<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentaCorrientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta_corrientes', function (Blueprint $table) {
            $table->id();
            $table->integer('tipo_movimiento'); // 1 in 2 out
            $table->date('fecha_vto')->nullable(); 

            $table->integer('rela_venta')->nullable(); 

            $table->float('importe', 8, 2);	
            $table->string('descripcion')->nullable();	
            $table->string('proveedor')->nullable();	
            $table->string('medio_pago')->nullable();	

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
        Schema::dropIfExists('cuenta_corrientes');
    }
}
