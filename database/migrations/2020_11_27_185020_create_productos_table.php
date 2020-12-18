<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string("cepa");
            $table->string("etiqueta");
            $table->string("descripcion")->default(null);
            $table->integer("stock");
            $table->float('precio', 8, 2);	
            $table->float('precio_ml', 8, 2);		
            $table->string("anio")->default(null);
            $table->string("bodega")->default(null);
            $table->string("codigo")->default(null);
            $table->integer("id_ml")->default(null);
            $table->json("json_ml")->default(null);
            $table->integer("id_wocommerce")->default(null);
            $table->json("json_wocommerce")->default(null);
           
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
        Schema::dropIfExists('productos');
    }
}
