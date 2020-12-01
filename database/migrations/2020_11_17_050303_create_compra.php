<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateCompra extends Migration
{
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {
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
            $table->unsignedBigInteger('id_detalle_compra');

            $table->foreign('id_producto')->references('id')->on('producto');
            $table->foreign('id_talla')->references('id')->on('talla');
            $table->foreign('id_detalle_compra')->references('id')->on('detalle_compra');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('compra');
    }
}
