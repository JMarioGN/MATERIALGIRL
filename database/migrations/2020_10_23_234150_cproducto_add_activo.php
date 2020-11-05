<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CproductoAddActivo extends Migration
{
    public function up()
    {
        Schema::table('cproducto', function (Blueprint $table){
            $table->integer('activo');
        });
    }
    public function down()
    {
        Schema::table('cproducto', function (Blueprint $table){
            $table->dropColumn('activo');
        });
    }
}
