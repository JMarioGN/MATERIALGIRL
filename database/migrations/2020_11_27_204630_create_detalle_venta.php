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
            $table->decimal('precio_venta',13,2)->default(0);
            $table->integer('cantidad')->default(0);
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_venta');

            $table->foreign('id_producto')->references('id')->on('producto');
            $table->foreign('id_venta')->references('id')->on('venta');
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
        Schema::dropIfExists('detalle_venta');
    }
}
