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
            $table->string('detalle',100);
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_proveedor');

            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_proveedor')->references('id')->on('proveedores');
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
