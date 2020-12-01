<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use App\Models\compra;

class siteController extends Controller
{
    public function index(){

        $tableUsers = DB::table('producto')
        ->join('cproducto', 'producto.cproducto_id', '=', 'cproducto.id')
        ->select('producto.*', 'cproducto.nombre as categoria_producto')
        ->get();

        $consultaC = DB::table('compra')
                        ->join('producto', 'compra.id_producto','=','producto.id')
                        ->select('compra.*','producto.id' ,'producto.nombre','producto.imgNombreFisico','compra.costo_pieza')
                        ->take(4)
                        ->get();
        return view('welcome', ["tableProductos" =>  $tableUsers, "consultaC" =>  $consultaC, ]);
    }
}
