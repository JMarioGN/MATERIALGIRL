<?php

namespace App\Http\Controllers;

use Session;
Use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use App\Models\cProducto;

class ProductoController extends Controller
{
    public function index(Request $request){
        $whereClause = []; 
        if($request->nombre){ 
            array_push($whereClause, [ "nombre" ,'like', '%'.$request->nombre.'%' ]);  
        } 

        $tableProductos = Producto::orderBy('nombre')
        ->where($whereClause)
        ->get();

        if(\Auth::user()->roles_id != 1){ 
            return view('productos.NotAllowed', ["tableProductos" =>  $tableProductos, "filtroNombre" => $request->nombre ]); 
        } 

        return view('productos.index', ["tableProductos" =>  $tableProductos, "filtroNombre" => $request->nombre ]);
    }

    public function create()
    {
        $tablecProductos = cProducto::orderBy('nombre')->get()->pluck('nombre','id');
        return view('productos.create',[ 'tablecProductos' => $tablecProductos ]);
        /*$combocategorias = cProducto::orderBy('nombre')->get()->pluck('nombre','id');
        $combousuarios = UserEloquent::orderBy('name')->get()->pluck('name','id');
        return view('productos.create',[ 'combocategorias' => $combocategorias, 'combousuarios' => $combousuarios ]);*/

    }

    public function store(Request $request)
    {

        // De forma automática regresa a la pantalla de origen creando una variable llamada $errors
        // la cual contiene las validaciones realizadas
        $validatedData = $request->validate([
            'nombre' => 'required|min:20|max:100',
            'descripcion' => 'required|min:50|max:200',
            'cproducto_id' => 'required|exists:cproducto,id'
        ]);
 
        $mProducto = new Producto($request->all());
        if($request->activo){
            $mProducto->activo = true; 
        } else {
            $mProducto->activo = false;
        }

        $mProducto->save();

        $file = $request->file('imagen');
        if($file){
            $imgNombreVirtual = $file->getClientOriginalName();
            $imgNombreFisico = $mProducto->id.'-'.$imgNombreVirtual;\Storage::disk('local')->put($imgNombreFisico, \File::get($file));
            $mProducto->imgNombreVirtual = $imgNombreVirtual;
            $mProducto->imgNombreFisico = $imgNombreFisico;
            $mProducto->save();
        }

        // Regresa a lista de productos
        Session::flash('message', '¡Producto creado!');
        return Redirect::to('productos');
    }

    public function show($id)
    {
        $modelo = Producto::find($id);
        return view('productos.show', ["modelo" => $modelo]);
    }

    public function edit($id)
    {
        $modelo = Producto::find($id);
        $tablecProductos = cProducto::orderBy('nombre')->get()->pluck('nombre','id');
        return view('productos.edit', ["modelo" => $modelo, "tablecProductos"=>$tablecProductos]);
    }

    public function update($id, Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|min:20|max:100',
            'descripcion' => 'required|min:50|max:200',
            'cproducto_id' => 'required|exists:cproducto,id'
        ]);

        $mProducto = Producto::find($id);
        $mProducto->fill($request->all());
        if($request->activo){
            $mProducto->activo = true; 
        } else {
            $mProducto->activo = false;
        }

        $mProducto->save(); 

        $file = $request->file('imagen'); 
        if($file){ 
            $imgNombreVirtual = $file->getClientOriginalName(); 
            $imgNombreFisico = $mProducto->id.'-'.$imgNombreVirtual; \Storage::disk('local')->put($imgNombreFisico, \File::get($file)); 
            $mProducto->imgNombreVirtual = $imgNombreVirtual; 
            $mProducto->imgNombreFisico = $imgNombreFisico; 
            $mProducto->save(); 
        } 


        Session::flash('message', '¡ACTUALIZADO!');
        return Redirect::to('productos');
        
    }

    public function destroy($id)
    {
        $mProducto = Producto::find($id);
        $mProducto->delete();
        Session::flash('message', '¡ELIMINADO!');
        return Redirect::to('productos');
    }

}
