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
    public function index(Request $request)
    {
        $whereClause = []; 
        if($request->nombre){ 
            array_push($whereClause, [ "nombre" ,'like', '%'.$request->nombre.'%' ]);  
        } 
        
        $table = cproducto::orderBy('nombre')->where($whereClause)->get();

        if(\Auth::user()->roles_id != 1){ 
            return view('cproducto.NotAllowed', ["table" =>  $table, "filtroNombre" => $request->nombre ]); 
        } 
        return view('cproducto.index', ["table" =>  $table,"filtroNombre" => $request->nombre ]);
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

        $file = $request->file('imagen');
        if($file){
            $imgNombreVirtual = $file->getClientOriginalName();
            $imgNombreFisico = $mcproducto->id.'-'.$imgNombreVirtual;\Storage::disk('local')->put($imgNombreFisico, \File::get($file));
            $mcproducto->imgNombreVirtual = $imgNombreVirtual;
            $mcproducto->imgNombreFisico = $imgNombreFisico;
            $mcproducto->save();
        }

        Session::flash('message', '¡C A T E G O R I A - C R E A D A!');
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

        $file = $request->file('imagen');
        if($file){
            $imgNombreVirtual = $file->getClientOriginalName();
            $imgNombreFisico = $mcproducto->id.'-'.$imgNombreVirtual;\Storage::disk('local')->put($imgNombreFisico, \File::get($file));
            $mcproducto->imgNombreVirtual = $imgNombreVirtual;
            $mcproducto->imgNombreFisico = $imgNombreFisico;
            $mcproducto->save();
        }

        Session::flash('message', '¡C A T E G O R I A - A C T U A L I Z A D A!');
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
