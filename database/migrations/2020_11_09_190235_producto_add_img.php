<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductoAddImg extends Migration
{
    public function up()
    {
       Schema::table('producto', function (Blueprint $table) {
            $table->string('imgNombreVirtual')->nullable();
            $table->string('imgNombreFisico')->nullable();
       });
    }
    public function down()
    {
        Schema::table('producto', function (Blueprint $table) {
            $table->dropColumn('imgNombreVirtual');
            $table->dropColumn('imgNombreFisico');
       });
    }
}
