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
    public function index(){

        $tableUsers = DB::table('producto')
        ->join('cproducto', 'producto.cproducto_id', '=', 'cproducto.id')
        ->select('producto.*', 'cproducto.nombre as categoria_producto')
        ->get();

        return view('productos.index', ["tableProductos" =>  $tableUsers ]);
    }

    public function create()
    {
        $tablecProductos = cProducto::orderBy('nombre')->get()->pluck('nombre','id');
        return view('productos.create',[ 'tablecProductos' => $tablecProductos ]);
    }

    public function store(Request $request)
    {

        // De forma automática regresa a la pantalla de origen creando una variable llamada $errors
        // la cual contiene las validaciones realizadas
        $validatedData = $request->validate([
            'nombre' => 'required|min:20|max:100',
            'descripcion' => 'required|min:50|max:200',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
            'cproducto_id' => 'required|exists:cproducto,id'
        ]);
 
        $mProducto = new Producto($request->all());
        if($request->activo){
            $mProducto->activo = true; 
        } else {
            $mProducto->activo = false;
        }

        $mProducto->save();

        // Regresa a lista de productos
        Session::flash('message', 'Producto creado!');
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
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|numeric|min:0',
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

        Session::flash('message', 'Producto actualizado!');
        return Redirect::to('productos');
        
    }

    public function destroy($id)
    {
        $mProducto = Producto::find($id);
        $mProducto->delete();
        Session::flash('message', 'Producto eliminado!');
        return Redirect::to('productos');
    }

}
