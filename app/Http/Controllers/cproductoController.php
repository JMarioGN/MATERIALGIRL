<?php

namespace App\Http\Controllers;

use Session;
Use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\cProducto;

class cproductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = cproducto::all();
        return view('cproducto.index', ["table" =>  $table ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cproducto.create',[ ]);
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
        ]);
 
        $mcproducto = new cProducto($request->all());
        if($request->activo){
            $mcproducto->activo = true; 
        } else {
            $mcproducto->activo = false;
        }

        $mcproducto->save();

        Session::flash('message', 'Categoria de producto creada!');
        return Redirect::to('cproducto');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelo = cProducto::find($id);
        return view('cProducto.show', ["modelo" => $modelo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modelo = cproducto::find($id);
        return view('cproducto.edit', ["modelo" => $modelo]);
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
        ]);

        $mcproducto = cProducto::find($id);
        $mcproducto->fill($request->all());
        if($request->activo){
            $mcproducto->activo = true; 
        } else {
            $mcproducto->activo = false;
        }

        $mcproducto->save();

        Session::flash('message', 'Categoria de producto actualizado!');
        return Redirect::to('cproducto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mcProducto = cproducto::find($id);
        $mcProducto->delete();
        Session::flash('message', 'Categoria eliminada!');
        return Redirect::to('cproducto');
    }
}
