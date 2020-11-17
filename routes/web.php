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
});
