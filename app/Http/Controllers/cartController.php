<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use App\Models\compra;
use App\Models\detalle_venta;

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
/*
    public function create(){
        $inDetalle=DB::insert('INSERT INTO detalle_venta
            (precio_venta, fecha_compra, fecha_vencimiento, codigo_seg, id_producto) VALUES (:precio_venta, :fecha_compra, :fecha_vencimiento, :codigo_seg, :id_producto)', ['precio_venta'=>'100', 'fecha_compra'=>'2020-11-26', 'fecha_vencimiento'=>'2020-11-26', 'codigo_seg'=>'1', 'id_producto'=>'1']);
            return view('cataPro.create');
    }
*/
}
