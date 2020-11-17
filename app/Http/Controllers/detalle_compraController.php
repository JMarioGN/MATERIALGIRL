<?php

namespace App\Http\Controllers;

use Session;
Use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\detalle_compra;
use App\Models\Producto;
use App\Models\talla;

class detalle_compraController extends Controller
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
            array_push($whereClause, [ "no_pedido" ,'like', '%'.$request->nombre.'%' ]);  
        } 

        $table = detalle_compra::orderBy('no_pedido')
        ->where($whereClause)
        ->get();

        if(\Auth::user()->roles_id != 1){ 
            return view('detalle_compra.NotAllowed', ["table" =>  $table, "filtroNombre" => $request->nombre ]); 
        } 

        return view('detalle_compra.index', ["table" =>  $table, "filtroNombre" => $request->nombre ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comboProducto = Producto::orderBy('nombre')->get()->pluck('nombre','id');
        $comboTalla = talla::orderBy('nombre')->get()->pluck('nombre','id');

        return view('detalle_compra.create',[ 'comboProducto' => $comboProducto, 'comboTalla' => $comboTalla ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_pedido' => 'required|min:3|max:100',
            'costo_pieza' => 'required|min:2|max:100',
            'color' => 'required|min:4|max:100',
            'fecha_compra' => 'required',
            'marca' => 'required|min:4|max:100',
            'modelo' => 'required|min:4|max:100',
            'cantidad' => 'required|min:1|max:100',
            'id_producto' => 'required',
            'id_talla' => 'required',
        ]);
 
        $mdetalle_compra = new detalle_compra($request->all());

        $mdetalle_compra->save();

        Session::flash('message', 'Detalle de compra creado!');
        return Redirect::to('detalle_compra');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelo = detalle_compra::find($id);
        return view('detalle_compra.show', ["modelo" => $modelo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modelo = detalle_compra::find($id);
        $table = detalle_compra::orderBy('no_pedido')->get()->pluck('nombre','id');
        $comboProducto = Producto::orderBy('nombre')->get()->pluck('nombre','id');
        $comboTalla = talla::orderBy('nombre')->get()->pluck('nombre','id');
        return view('detalle_compra.edit', ["modelo" => $modelo, "table"=>$table, 'comboProducto' => $comboProducto, 'comboTalla' => $comboTalla]);
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
        $validatedData = $request->validate([
            'no_pedido' => 'required|min:3|max:100',
            'costo_pieza' => 'required|min:2|max:100',
            'color' => 'required|min:4|max:100',
            'fecha_compra' => 'required',
            'marca' => 'required|min:4|max:100',
            'modelo' => 'required|min:4|max:100',
            'cantidad' => 'required|min:1|max:100',
            'id_producto' => 'required',
            'id_talla' => 'required',
        ]);
 
        $mdetalle_compra = detalle_compra::find($id);
        $mdetalle_compra->fill($request->all());

        $mdetalle_compra->save();

        Session::flash('message', 'Detalle de compra actualizado!');
        return Redirect::to('detalle_compra');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mdetalle_compra = detalle_compra::find($id);
        $mdetalle_compra->delete();
        Session::flash('message', '¡ELIMINADO!');
        return Redirect::to('detalle_compra');
    }
}
