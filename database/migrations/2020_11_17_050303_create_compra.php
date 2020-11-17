<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {
            $table->id();
            $table->decimal('total',13,2)->default(0);
            $table->unsignedBigInteger('id_detalle_compra');
            $table->unsignedBigInteger('id_proveedor');
            $table->unsignedBigInteger('id_usuario');

            $table->foreign('id_detalle_compra')->references('id')->on('detalle_compra');
            $table->foreign('id_proveedor')->references('id')->on('proveedores');
            $table->foreign('id_usuario')->references('id')->on('users');
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
        Schema::dropIfExists('compra');
    }
}
