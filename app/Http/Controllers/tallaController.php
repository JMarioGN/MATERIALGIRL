<?php

namespace App\Http\Controllers;

use Session;
Use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\talla;

class tallaController extends Controller
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
            array_push($whereClause, [ "talla" ,'like', '%'.$request->nombre.'%' ]);  
        } 

        
        $table = talla::orderBy('talla')->where($whereClause)->get();

        if(\Auth::user()->roles_id != 1){ 
            return view('talla.NotAllowed', ["table" =>  $table, "filtroNombre" => $request->nombre ]); 
        } 
        
        return view('talla.index', ["table" =>  $table,"filtroNombre" => $request->nombre ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('talla.create',[ ]);
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
            'talla' => 'required|min:5|max:100',
            
        ]);
 
        $mtalla = new talla($request->all());

        $mtalla->save();

        Session::flash('message', '¡Talla creada!');
        return Redirect::to('talla');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelo = talla::find($id);
        return view('talla.show', ["modelo" => $modelo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modelo = talla::find($id);
        $table = talla::orderBy('talla')->get()->pluck('talla','id');
        return view('talla.edit', ["modelo" => $modelo]);
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
            'talla' => 'required|min:5|max:100',
        ]);

        $mtalla = talla::find($id);
        $mtalla->fill($request->all());

        $mtalla->save();

        Session::flash('message', '¡Talla actualizada!');
        return Redirect::to('talla');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mtalla = talla::find($id);
        $mtalla->delete();
        Session::flash('message', '¡Talla eliminada!');
        return Redirect::to('talla');
    }
}
