<?php

namespace App\Http\Controllers;

use Session;
Use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\roles;

class rolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = roles::all();
        return view('roles.index', ["table" =>  $table ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create',[ ]);
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
 
        $mroles = new roles($request->all());

        $mroles->save();

        Session::flash('message', 'Rol creado!');
        return Redirect::to('roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelo = roles::find($id);
        return view('roles.show', ["modelo" => $modelo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modelo = roles::find($id);
        $table = roles::orderBy('nombre')->get()->pluck('nombre','id');
        return view('roles.edit', ["modelo" => $modelo]);
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

        $mroles = roles::find($id);
        $mroles->fill($request->all());

        $mroles->save();

        Session::flash('message', '¡Rol actualizado!');
        return Redirect::to('roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mroles = roles::find($id);
        $mroles->delete();
        Session::flash('message', '¡Rol eliminado!');
        return Redirect::to('roles');
    }
}
