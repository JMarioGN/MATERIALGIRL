<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\venta;
use App\Models\detalle_venta;

use Maatwebsite\Excel\Concerns\FromCollection; 
use App\Exports\DataExcelExport; 

class ventaController extends Controller
{
    public function excel($id) 
    { 
         $areglo=[ ['MATERIALGIRL'],
                ['Reporte de ventas'],
                ['Costo de envío:', 'Total:', 'Fecha de venta:'],];

        $ventas=DB::table('venta')
                        ->select('venta.*')
                        ->where('venta.id','=',$id)
                        ->get();

        $items=DB::table('detalle_venta')
                        ->join('venta', 'detalle_venta.id_venta','=','venta.id')
                        ->join('producto', 'detalle_venta.id_producto','=','producto.id')
                        ->select('producto.nombre','producto.descripcion','detalle_venta.precio_venta', 'detalle_venta.cantidad')
                        ->where('detalle_venta.id_venta','=',$id)
                        ->get();

        foreach ($ventas as $v) {
            array_push($areglo, [$v->costoE,($v->total+$v->costoE), $v->created_at]);
        }

        array_push($areglo, ['Detalle de productos']);
        array_push($areglo, ['Nombre del producto:', 'Descripcion:', 'Precio:', 'Cantidad:']);

        foreach ($items as $i) {
            array_push($areglo, [$i->nombre, $i->descripcion, $i->precio_venta, $i->cantidad]);
        }
                        /*
        foreach ($usuarios as $u) {
           $datos = new DataExcelExport([ 
                ['MATERIALGIRL'],
                ['Reporte de usuarios'],
                ['Nombre:', 'Correo:', 'Fecha registro:', 'Rol:'], 
                [$u->name, $u->email, $u->created_at, $u->nombre] 
            ]); 
        }
*/
        $datos = new DataExcelExport($areglo);
        //return $areglo;
        return \Excel::download( $datos, 'reporte_ventas.xlsx'); 
    } 

    public function index(Request $request)
    {
        $whereClause = []; 
        if($request->nombre){ 
            array_push($whereClause, [ "total" ,'like', '%'.$request->nombre.'%' ]);  
        } 

        $table = venta::orderBy('total')->where($whereClause)->get();

        if(\Auth::user()->roles_id != 1){ 
            return view('ventas.NotAllowed', ["table" =>  $table, "filtroNombre" => $request->nombre ]); 
        } 

        return view('ventas.index', ["table" =>  $table, "filtroNombre" => $request->nombre ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalleItems = DB::table('detalle_venta')
                        ->join('producto', 'detalle_venta.id_producto','=','producto.id')
                        ->join('venta', 'detalle_venta.id_venta','=','venta.id')
                        ->select('producto.nombre', 'producto.imgNombreFisico','detalle_venta.cantidad','detalle_venta.precio_venta')
                        ->where('detalle_venta.id_venta', '=', $id)
                        ->get();
        $modelo = venta::find($id);
        
        //return $detalleItems;

        return view('ventas.show', ["modelo" => $modelo,"detalleItems" => $detalleItems]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
