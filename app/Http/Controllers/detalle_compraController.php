<?php

namespace App\Http\Controllers;

use Session;
Use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\detalle_compra;
use App\Models\compra;
use App\Models\Producto;
use App\Models\proveedores;
use App\Models\UserEloquent;
use App\Models\talla;

use Maatwebsite\Excel\Concerns\FromCollection; 
use App\Exports\DataExcelExport; 

class detalle_compraController extends Controller
{
    public function excel($id) 
    { 
         $areglo=[ ['MATERIALGIRL'],
                ['Reporte de pedidos'],
                ['Detalle:', 'Fecha de pedido:'],];

        $pedido=DB::table('detalle_compra')
                        ->select('detalle_compra.*')
                        ->where('detalle_compra.id','=',$id)
                        ->get();

        $detalleItems = DB::table('compra')
                        ->join('producto', 'compra.id_producto','=','producto.id')
                        ->join('talla', 'compra.id_talla','=','talla.id')
                        ->join('proveedores', 'compra.id_proveedor','=','proveedores.id')
                        ->select('producto.id','producto.imgNombreFisico', 'producto.nombre', 'compra.cantidad','compra.costo_pieza','compra.marca','compra.modelo','talla.talla','compra.id_proveedor','proveedores.proveedor')
                        ->where('compra.id_detalle_compra', '=', $id)
                        ->get();

        foreach ($pedido as $p) {
            array_push($areglo, [$p->detalle, $p->created_at]);
        }

        array_push($areglo, ['Detalle de productos']);
        array_push($areglo, ['Nombre del producto:', 'Cantidad:', 'Costo:', 'Marca:', 'Modelo:', 'Talla:', 'Proveedor:']);

        foreach ($detalleItems as $di) {
            array_push($areglo, [$di->nombre, $di->cantidad, $di->costo_pieza, $di->marca, $di->modelo, $di->talla, $di->proveedor]);
        }

        $datos = new DataExcelExport($areglo);
        //return $areglo;
        return \Excel::download( $datos, 'reporte_pedidos.xlsx'); 
    } 

    public function index(Request $request)
    {
        $whereClause = []; 
        if($request->nombre){ 
            array_push($whereClause, [ "detalle" ,'like', '%'.$request->nombre.'%' ]);  
        } 

        $table = detalle_compra::orderBy('detalle')
        ->where($whereClause)
        ->get();

        if(\Auth::user()->roles_id != 1){ 
            return view('detalle_compra.NotAllowed', ["table" =>  $table, "filtroNombre" => $request->nombre ]); 
        } 

        return view('detalle_compra.index', ["table" =>  $table, "filtroNombre" => $request->nombre ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comboProveedor = proveedores::orderBy('proveedor')->get()->pluck('proveedor','id');
        $comboUsuario = UserEloquent::orderBy('name')->get()->pluck('name','id');

        return view('detalle_compra.create',[ 'comboProveedor' => $comboProveedor, 'comboUsuario' => $comboUsuario ]);
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
            'detalle' => 'required|min:4|max:100',
            'id_usuario' => 'required',
        ]);
 
        $mdetalle_compra = new detalle_compra($request->all());

        $mdetalle_compra->save();

        Session::flash('message', 'Detalle de compra creado!');
        return Redirect::to('detalle_compra');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalleItems = DB::table('compra')
                        ->join('producto', 'compra.id_producto','=','producto.id')
                        ->join('talla', 'compra.id_talla','=','talla.id')
                        ->join('proveedores', 'compra.id_proveedor','=','proveedores.id')
                        ->select('producto.id','producto.imgNombreFisico', 'producto.nombre', 'compra.cantidad','compra.costo_pieza','compra.marca','compra.modelo','talla.talla','compra.id_proveedor','proveedores.proveedor')
                        ->where('compra.id_detalle_compra', '=', $id)
                        ->get();
        $modelo = detalle_compra::find($id);
        
        //return $m;

        return view('detalle_compra.show', ["modelo" => $modelo,"detalleItems" => $detalleItems]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comboProveedor = proveedores::orderBy('proveedor')->get()->pluck('proveedor','id');
        $comboUsuario = UserEloquent::orderBy('name')->get()->pluck('name','id');
        $modelo = detalle_compra::find($id);
        
        return view('detalle_compra.edit', ["modelo" => $modelo,'comboProveedor' => $comboProveedor, 'comboUsuario' => $comboUsuario]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'detalle' => 'required|min:4|max:100',
            'id_usuario' => 'required',
        ]);
 
        $mdetalle_compra = detalle_compra::find($id);
        $mdetalle_compra->fill($request->all());

        $mdetalle_compra->save();

        Session::flash('message', 'Detalle de compra actualizado!');
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
        $mItemscompra = compra::where('id_detalle_compra', '=', $id)
                        ->first();
        $mItemscompra->delete();

        $mdetalle_compra = detalle_compra::find($id);
        $mdetalle_compra->delete();
        Session::flash('message', '¡ELIMINADO!');
        return Redirect::to('detalle_compra');
        
    }
}
