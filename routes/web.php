<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

Route::get('/', 'siteController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cache', function () {
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    return "Caché limpio";
})->name('cache');

Route::group(['middleware' => ['auth'] ], function(){
    Route::resource('users', 'UserController');
    Route::resource('productos', 'ProductoController');
    Route::resource('roles', 'rolesController');
    Route::resource('cproducto', 'cproductoController');
    Route::resource('detalle_venta', 'detalle_ventaController');
    Route::resource('detalle_compra', 'detalle_compraController');
    Route::resource('proveedores', 'proveedoresController');
    Route::resource('talla', 'tallaController');
    Route::resource('compra', 'compraController');
    Route::resource('forma_pago', 'forma_pagoController');
    Route::resource('ventas', 'ventaController');

    Route::resource('cataPro', 'catalogoController');

    Route::get('cataPro.cart', 'cartController@index')->name('cart');

    

    Route::bind('cataPro.index', function($row){
        return App\detalle_compra::where('id', $row)->first();
    });
    //carrito
    Route::get('cart/show',[
        'as' => 'cart-show',
        'uses' => 'cartController@show'
    ]);

    Route::get('cart/add/{row}',[
        'as' => 'cart-add',
        'uses' => 'cartController@add'
    ]); 

    Route::get('cart/delete/{row}',[
        'as' => 'cart-delete',
        'uses' => 'cartController@delete'
    ]); 

    Route::get('cart/vaciar/',[
        'as' => 'cart-vaciar',
        'uses' => 'cartController@vaciar'
    ]);
    Route::get('cart/update/{row}/{cantidad?}',[
        'as' => 'cart-update',
        'uses' => 'cartController@update'
    ]); 
    
//------------------------------------------------------
    //detalle pedido
    Route::get('order-detail',[
        'middleware' => 'auth',
        'as' => 'order-detail',
        'uses' => 'cartController@orderDetail'
    ]); 
//-------------------------------
    //PAYPAL
    Route::get('payment',array(
        'as' => 'payment',
        'uses' => 'paypalController@postPayment',
    )); 
    Route::get('payment/status',array(
        'as' => 'payment.status',
        'uses' => 'paypalController@getPaymentStatus',
    )); 

    //Route::get('cart/create', 'cartController@create')->name('cataPro.create'); 
    
    //mis compras
    Route::get('cataPro.misCompras', 'cartController@mc')->name('misCompras');
    Route::get('cataPro.items', 'cartController@items')->name('items');
    Route::get('cataPro.misDatos/{id}', 'cartController@edit')->name('misDatos');
    Route::get('cataPro.misDatos/{id}', 'cartController@edit')->name('misDatos');
    Route::post('/misDatos/actualiza/{id}/{request?}',array(
        'as' => 'misDatos-actualiza',
        'uses' => 'cartController@actualiza',
    )); 
    // reporte de compras lo imprime el cliente
    Route::get('/ex/{id}', 'cartController@excel')->name('ex'); 

    // reporte de compras 
    Route::get('/c/{id}', 'detalle_compraController@excel')->name('c'); 
    // reporte de ventas
    Route::get('/v/{id}', 'ventaController@excel')->name('v'); 



    // exportar a excell

    Route::get('/excel/', 'UserController@excel')->name('excel'); 

    Route::post('/agregarCarrito', 'ProductoController@agregarCarrito') ->name('agregarCarrito'); 
    Route::get('/notificaciones', 'UserController@notificaciones')->name('notificaciones'); 

});
