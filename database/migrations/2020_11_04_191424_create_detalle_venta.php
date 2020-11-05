<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleVenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->string('ap',100);
            $table->string('am',100);
            $table->integer('sexo');
            $table->timestamp('fecha_compra');
            $table->string('direccion',200);
            $table->integer('telefono');
            $table->unsignedBigInteger('id_usuario')->default(0);
            $table->unsignedBigInteger('id_producto')->default(0);
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
        Schema::table('detalle_venta',function(Blueprint $table){
           
            $table->dropColumn('id_usuario');
            
            $table->dropColumn('id_producto');
        });
        Schema::dropIfExists('detalle_venta');
    }
}
