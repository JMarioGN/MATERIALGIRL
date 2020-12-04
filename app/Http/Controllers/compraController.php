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
use App\Models\compra;
use App\Models\proveedores;

class compraController extends Controller
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

        $table = compra::orderBy('no_pedido')
        ->where($whereClause)
        ->get();

        if(\Auth::user()->roles_id != 1){ 
            return view('compra.NotAllowed', ["table" =>  $table, "filtroNombre" => $request->nombre ]); 
        } 

        return view('compra.index', ["table" =>  $table, "filtroNombre" => $request->nombre ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comboProducto = Producto::orderBy('nombre')->get()->pluck('nombre','id');
        $comboTalla = talla::orderBy('talla')->get()->pluck('talla','id');
        $comboDetalle = detalle_compra::orderBy('detalle')->get()->pluck('detalle','id');
        $comboProveedor = proveedores::orderBy('proveedor')->get()->pluck('proveedor','id');

        return view('compra.create',[ 'comboProducto' => $comboProducto, 'comboTalla' => $comboTalla, 'comboDetalle' => $comboDetalle, 'comboProveedor' => $comboProveedor ]);
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
            'no_pedido' => 'required|numeric|min:1|max:9999999999',
            'costo_pieza' => 'required|numeric|min:1|max:9999999999',
            'color' => 'required|min:1|max:20',
            'fecha_compra' => 'required',
            'marca' => 'required|min:1|max:20',
            'modelo' => 'required|numeric|min:1|max:9999999999',
            'cantidad' => 'required|numeric|min:1|max:9999999999',
            'id_producto' => 'required',
            'id_talla' => 'required',
            'id_proveedor' => 'required',
            'id_detalle_compra' => 'required',
        ]);
 
        $mcompra = new compra($request->all());

        $mcompra->save();

        Session::flash('message', 'Compra creada!');
        return Redirect::to('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelo = compra::find($id);
        return view('compra.show', ["modelo" => $modelo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modelo = compra::find($id);
        
        $comboProducto = Producto::orderBy('nombre')->get()->pluck('nombre','id');
        $comboTalla = talla::orderBy('talla')->get()->pluck('talla','id');
        $comboDetalle = detalle_compra::orderBy('detalle')->get()->pluck('detalle','id');
        $comboProveedor = proveedores::orderBy('proveedor')->get()->pluck('proveedor','id');

        return view('compra.edit',[ "modelo" => $modelo, 'comboProducto' => $comboProducto, 'comboTalla' => $comboTalla, 'comboDetalle' => $comboDetalle, 'comboProveedor' => $comboProveedor]);
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
            'no_pedido' => 'required|numeric|min:1|max:9999999999',
            'costo_pieza' => 'required|numeric|min:1|max:9999999999',
            'color' => 'required|min:1|max:20',
            'fecha_compra' => 'required',
            'marca' => 'required|min:1|max:20',
            'modelo' => 'required|numeric|min:1|max:9999999999',
            'cantidad' => 'required|numeric|min:1|max:9999999999',
            'id_producto' => 'required',
            'id_talla' => 'required',
            'id_detalle_compra' => 'required',
        ]);

        $mcompra = compra::find($id);
        $mcompra->fill($request->all());

        $mcompra->save();

        Session::flash('message', 'Compra actualizada!');
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
        $mcompra = compra::find($id);
        $mcompra->delete();
        Session::flash('message', '¡ELIMINADO!');
        return Redirect::to('detalle_compra');
    }
}
