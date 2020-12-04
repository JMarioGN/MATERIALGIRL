<?php

namespace App\Http\Controllers;

use Session;
Use Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use App\Models\compra;
use App\Models\detalle_venta;
use App\Models\UserEloquent;

use Maatwebsite\Excel\Concerns\FromCollection; 
use App\Exports\DataExcelExport; 

class cartController extends Controller
{

    public function __construct()
    {
        if(!\Session::has('cart')) \Session::put('cart', array());
    }

    public function show()
    {
        $cart = \Session::get('cart');
        $total = $this->total();
        
        foreach ($cart as $item) {
            $c=compra::find($item->id);
        }
        

        //return $n;
        return view('cataPro.cart', compact('cart', 'total', 'c'));
    }

    public function add(compra $row)
    {
        $cart = \Session::get('cart');
        $row->cantidad = 1;

        
        
        $cart[$row->id] = $row;
        \Session::put('cart', $cart);

        //return $cart;
        return redirect()->route('cart-show');
    }
    public function index()
    {
        return view('cart'); 
    }

    public function delete(compra $row)
    {
        $cart = \Session::get('cart');
        unset($cart[$row->id]);
        \Session::put('cart', $cart);
        return redirect()->route('cart-show');
    }

    public function vaciar(){
        $cart = \Session::forget('cart');
        return redirect()->route('cart-show');
    }

    public function update(compra $row, $cantidad){
        $cart = \Session::get('cart');
        $cart[$row->id]->cantidad = $cantidad;
        \Session::put('cart', $cart);
        return redirect()->route('cart-show');
    }

    private function total(){
        $cart = \Session::get('cart');
        $total = 0;
        foreach ($cart as $item) {
            $total += $item->costo_pieza*1.30 * $item->cantidad;
        }
        return $total;
    }
    private function nom(){
        $cart = \Session::get('cart');

        $n=[];
        foreach ($cart as $item) {
            $nomImg=Producto::find(1);
        }
        foreach ($cart as $item) {
            $nomImg2=Producto::find(2);
        }
        $n[0]=$nomImg;
        $n[1]=$nomImg2;

        return $n;
    }

    // detalle de pedido
    public function orderDetail(){
        if(count(\Session::get('cart')) <= 0) return redirect()->route('home');
        $cart = \Session::get('cart');
        $total = $this->total();
        $nomImg = $this->nom();

        

        return view('cataPro.orderDetail', compact('cart', 'total', 'nomImg'));
    }

    public function mc(){
        //return 'hola';

        
        $ventas=DB::table('venta')
                        ->select('venta.*')
                        ->where('venta.id_usuario','=',\Auth::user()->id)
                        ->get();
        //return $items;
        return view('cataPro.misCompras', ["ventas" => $ventas ]);
    }
    public function items(){
        $items=DB::table('detalle_venta')
                        ->join('venta', 'detalle_venta.id_venta','=','venta.id')
                        ->join('producto', 'detalle_venta.id_producto','=','producto.id')
                        ->select('producto.imgNombreFisico','producto.nombre','producto.descripcion','detalle_venta.precio_venta', 'detalle_venta.cantidad')
                        ->where('venta.id_usuario','=',\Auth::user()->id)
                        ->get();
        return view('cataPro.items', ["items" =>  $items]);
    }
    public function excel($id) 
    { 
         $areglo=[ ['MATERIALGIRL'],
                ['Mis compras'],
                ['Costo de envío:', 'Total:', 'Fecha de compra:'],];

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
        return \Excel::download( $datos, 'reporte_compras.xlsx'); 
    } 

    public function edit($id)
    {
        //return $id;
        
        $mUser = UserEloquent::find($id);
        return view('cataPro.misDatos', ['modelo'=>$mUser]);
        
    }

    public function actualiza($id, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:5|max:100',
            'password' => 'min:5|max:15',
            'email' => 'required|email',
        ]);

        $mUser = UserEloquent::find($id);
        $mUser->name       = $request->name;
        $mUser->email      = $request->email;
        $mUser->updated_at = date('Y-m-d H:i:s');
        if($request->password != '*****'){
            $mUser->password = bcrypt($request->password);
        }
        $mUser->save();

        // Regresa a lista de usuario
        Session::flash('message', '¡Usuario actualizado!');
        return Redirect::to('home');
    }
/*
    public function create(){
        $inDetalle=DB::insert('INSERT INTO detalle_venta
            (precio_venta, fecha_compra, fecha_vencimiento, codigo_seg, id_producto) VALUES (:precio_venta, :fecha_compra, :fecha_vencimiento, :codigo_seg, :id_producto)', ['precio_venta'=>'100', 'fecha_compra'=>'2020-11-26', 'fecha_vencimiento'=>'2020-11-26', 'codigo_seg'=>'1', 'id_producto'=>'1']);
            return view('cataPro.create');
    }
*/
}
