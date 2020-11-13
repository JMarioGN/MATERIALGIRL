<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

class siteController extends Controller
{
    public function index(){

        $tableUsers = DB::table('producto')
        ->join('cproducto', 'producto.cproducto_id', '=', 'cproducto.id')
        ->select('producto.*', 'cproducto.nombre as categoria_producto')
        ->get();

        return view('welcome', ["tableProductos" =>  $tableUsers ]);
    }
}
