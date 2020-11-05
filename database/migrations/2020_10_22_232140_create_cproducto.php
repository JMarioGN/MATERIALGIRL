<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCproducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cproducto', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        Schema::table('producto', function (Blueprint $table){
            $table->unsignedBigInteger('cproducto_id');
            $table->foreign('cproducto_id')->references('id')->on('cproducto');
            $table->boolean('activo');
            $table->boolean('venta');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('producto',function(Blueprint $table){
            $table->dropColumn('activo');
            $table->dropColumn('venta');
            $table->dropForeign(['cproducto_id']);
            $table->dropColumn('cproducto_id');
        });

        Schema::dropIfExists('cproducto');
    }
}
