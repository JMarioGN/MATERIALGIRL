<?php

namespace App\Http\Controllers;

use Session;
Use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\proveedores;

class proveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = proveedores::all();
        return view('proveedores.index', ["table" =>  $table ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proveedores.create',[ ]);
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
            'nombre' => 'required|min:4|max:100',
            'telefono' => 'required|min:1|max:10',
            'direccion' => 'required|min:10|max:200',
        ]);
 
        $mproveedores = new proveedores($request->all());

        $mproveedores->save();

        Session::flash('message', 'Proveedor creado!');
        return Redirect::to('proveedores');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelo = proveedores::find($id);
        return view('proveedores.show', ["modelo" => $modelo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modelo = proveedores::find($id);
        $table = proveedores::orderBy('nombre')->get()->pluck('nombre','id');
        return view('proveedores.edit', ["modelo" => $modelo]);
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
            'nombre' => 'required|min:4|max:100',
            'telefono' => 'required|min:1|max:10',
            'direccion' => 'required|min:10|max:200',
        ]);

        $mproveedores = proveedores::find($id);
        $mproveedores->fill($request->all());

        $mproveedores->save();

        Session::flash('message', 'Rol actualizado!');
        return Redirect::to('proveedores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mroles = proveedores::find($id);
        $mroles->delete();
        Session::flash('message', 'Rol eliminado!');
        return Redirect::to('proveedores');
    }
}
