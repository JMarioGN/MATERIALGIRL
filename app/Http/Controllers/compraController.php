<?php

namespace App\Http\Controllers;

use Session;
Use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\detalle_compra;
use App\Models\proveedores;
use App\Models\UserEloquent;
use App\Models\compra;

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
            array_push($whereClause, [ "id_usuario" ,'like', '%'.$request->nombre.'%' ]);  
        } 

        $table = compra::orderBy('id_usuario')
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
        $comboDetalle_compra = detalle_compra::orderBy('no_pedido')->get()->pluck('no_pedido','id');
        $comboProveedor = proveedores::orderBy('nombre')->get()->pluck('nombre','id');
        $comboUsuario = UserEloquent::orderBy('name')->get()->pluck('name','id');

        return view('compra.create',[ 'comboDetalle_compra' => $comboDetalle_compra, 'comboProveedor' => $comboProveedor, 'comboUsuario' => $comboUsuario ]);
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
            'total' => 'required|min:1|max:100',
            'id_detalle_compra' => 'required',
            'id_proveedor' => 'required',
            'id_usuario' => 'required',
        ]);
 
        $mcompra = new compra($request->all());

        $mcompra->save();

        Session::flash('message', 'Compra creada!');
        return Redirect::to('compra');
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
        
        $comboDetalle_compra = detalle_compra::orderBy('no_pedido')->get()->pluck('no_pedido','id');
        $comboProveedor = proveedores::orderBy('nombre')->get()->pluck('nombre','id');
        $comboUsuario = UserEloquent::orderBy('name')->get()->pluck('name','id');

        return view('compra.edit',[ "modelo" => $modelo, 'comboDetalle_compra' => $comboDetalle_compra, 'comboProveedor' => $comboProveedor, 'comboUsuario' => $comboUsuario ]);
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
            'total' => 'required|min:1|max:100',
            'id_detalle_compra' => 'required',
            'id_proveedor' => 'required',
            'id_usuario' => 'required',
        ]);

        $mcompra = compra::find($id);
        $mcompra->fill($request->all());

        $mcompra->save();

        Session::flash('message', 'Compra actualizada!');
        return Redirect::to('compra');
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
        return Redirect::to('compra');
    }
}
