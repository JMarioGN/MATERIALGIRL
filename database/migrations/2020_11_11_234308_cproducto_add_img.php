<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CproductoAddImg extends Migration
{
    public function up()
    {
       Schema::table('cproducto', function (Blueprint $table) {
            $table->string('imgNombreVirtual')->nullable();
            $table->string('imgNombreFisico')->nullable();
       });
    }
    public function down()
    {
        Schema::table('cproducto', function (Blueprint $table) {
            $table->dropColumn('imgNombreVirtual');
            $table->dropColumn('imgNombreFisico');
       });
    }
}
