<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_compra', function (Blueprint $table) {
            $table->id();
            $table->integer('no_pedido');
            $table->decimal('costo_pieza',13,2)->default(0);
            $table->string('color',100);
            $table->date('fecha_compra');
            $table->string('marca',100);
            $table->string('modelo',100);
            $table->integer('cantidad');

            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_talla');

            $table->foreign('id_producto')->references('id')->on('producto');
            $table->foreign('id_talla')->references('id')->on('talla');
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
        Schema::dropIfExists('detalle_compra');
    }
}
