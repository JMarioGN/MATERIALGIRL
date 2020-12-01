<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use App\Models\compra;
use App\Models\talla;
use App\Models\cProducto;

class catalogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = DB::table('producto')->select('producto.*')
        ->get();

        $consultaC = DB::table('compra')
                        ->join('producto', 'compra.id_producto','=','producto.id')
                        ->select('compra.*','producto.id','producto.nombre','producto.imgNombreFisico','compra.costo_pieza')
                        ->get();

        return view('cataPro.index', ["productos" =>  $productos, "consultaC" =>  $consultaC]); 
    }

    /*
    public function filtrar($id)
    {
        $productos = Producto::where('cproducto_id', $id)
        $categorias = cProducto::all();

        return view('cataPro.index', compact("productos", "categorias"));         
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
       $consultaC = DB::table('compra')
                        ->join('producto', 'compra.id_producto','=','producto.id')
                        ->select('compra.*', 'producto.nombre','producto.imgNombreFisico','compra.costo_pieza')
                        ->where('compra.id_producto', '=',$id)
                        ->get();
        
        /*$consultaC = DB::table('detalle_compra')
                        ->join('producto', 'detalle_compra.id_producto','=','producto.id')
                        ->join('talla', 'detalle_compra.id_talla','=','talla.id')
                        ->select('detalle_compra.*','producto.nombre','producto.imgNombreFisico','detalle_compra.costo_pieza','talla.nombre')
                        ->where('producto.id', '=',$id)
                        ->get();
        */
        /*$tallas = DB::table('talla')
                        ->select('talla.*')
                        ->get();*/
        $comboTalla = talla::orderBy('talla')->get()->pluck('talla','id');

        $modelo = Producto::find($id);
        return view('cataPro.show', ["modelo" => $modelo, "consultaC" => $consultaC, "comboTalla" => $comboTalla]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
