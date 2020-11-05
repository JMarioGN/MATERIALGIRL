<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateProducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('producto', function (Blueprint $table){
            $table->string('descripcion');
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
    public function down()
    {
        Schema::table('producto', function (Blueprint $table){
            $table->dropColumn('descripcion');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
}
