<?php

namespace App\Http\Controllers;

use Session;
Use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use App\Models\UserEloquent;
use App\Models\detalle_venta;

class detalle_ventaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tabledetalleV = detalle_venta::all();
        return view('detalle_venta.index', ["tabledetalleV" =>  $tabledetalleV ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('detalle_venta.create', []);
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
            'nombre' => 'required|min:5|max:100',
            'ap' => 'required|min:5|max:100',
            'am' => 'required|min:5|max:100',
            'telefono' => 'required|numeric|min:1|max:9999999999',
            'direccion' => 'required|min:10|max:200',
            //'id_usuario'=>'required|exists:users,id'
            //'id_producto'=>'required|exists:producto,id'
        ]);
 
        $mDetalle_venta = new detalle_venta($request->all());
        if($request->sexo){
            $mDetalle_venta->sexo = true; 
        } else {
            $mDetalle_venta->sexo = false;
        }

        $mDetalle_venta->save();

        Session::flash('message', '¡Detalle de venta registrado!');
        return Redirect::to('detalle_venta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mDetalle_venta = detalle_venta::find($id);
        return view('detalle_venta.show', ["modelo" => $mDetalle_venta]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mDetalle_venta = detalle_venta::find($id);
        
        return view('detalle_venta.edit', ['modelo'=>$mDetalle_venta, ]);
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
            'nombre' => 'required|min:5|max:100',
            'ap' => 'required|min:5|max:100',
            'am' => 'required|min:5|max:100',
            'telefono' => 'required|numeric|min:1|max:9999999999',
            'direccion' => 'required|min:10|max:200',
            //'id_usuario'=>'required|exists:users,id'
            //'id_producto'=>'required|exists:producto,id'
        ]);
 
        $mDetalle_venta = detalle_venta::find($id);
        $mDetalle_venta->fill($request->all());
        if($request->sexo){
            $mDetalle_venta->sexo = true; 
        } else {
            $mDetalle_venta->sexo = false;
        }

        $mDetalle_venta->save();

        Session::flash('message', '¡Detalle de venta editado!');
        return Redirect::to('detalle_venta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mDetalle_venta = detalle_venta::find($id);
        $mDetalle_venta->delete();

        Session::flash('message', '¡Detalle de venta eliminado!');
        return Redirect::to('detalle_venta');
    }
}
