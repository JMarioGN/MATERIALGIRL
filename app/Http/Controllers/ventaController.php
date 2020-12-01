<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\venta;
use App\Models\detalle_venta;

class ventaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $whereClause = []; 
        if($request->nombre){ 
            array_push($whereClause, [ "total" ,'like', '%'.$request->nombre.'%' ]);  
        } 

        $table = venta::orderBy('total')->where($whereClause)->get();

        if(\Auth::user()->roles_id != 1){ 
            return view('ventas.NotAllowed', ["table" =>  $table, "filtroNombre" => $request->nombre ]); 
        } 

        return view('ventas.index', ["table" =>  $table, "filtroNombre" => $request->nombre ]);
    }

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
        $detalleItems = DB::table('detalle_venta')
                        ->join('producto', 'detalle_venta.id_producto','=','producto.id')
                        ->join('venta', 'detalle_venta.id_venta','=','venta.id')
                        ->select('producto.nombre', 'producto.imgNombreFisico','detalle_venta.cantidad','detalle_venta.precio_venta')
                        ->where('detalle_venta.id_venta', '=', $id)
                        ->get();
        $modelo = venta::find($id);
        
        //return $detalleItems;

        return view('ventas.show', ["modelo" => $modelo,"detalleItems" => $detalleItems]);
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
