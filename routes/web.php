<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/clear', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/vistaclear', function() {
    Artisan::call('view:clear');
    return "Views cache is cleared";
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('/dash','DashGeneralController@index')->name('index');
    Route::get('/productos', 'ProductoController@index')->name('index');
    Route::get('/','DashGeneralController@index')->name('index');

    Route::post('/productos','ProductoController@store')->name('store');
    Route::get('/producto/editar/{idProducto}','ProductoController@editarGet')->name('store');
    Route::post('/producto/editar/{idProducto}','ProductoController@editarPost')->name('store');

    Route::get('/clientes', 'ClienteController@index')->name('index');
    Route::post('/clientes','ClienteController@store')->name('store');
    
    Route::get('/compras', 'CompraController@index')->name('index');
    Route::post('/compras','CompraController@store')->name('store');

    Route::get('/ctacte', 'CuentaCorrienteController@index')->name('index');
    Route::post('/ctacte','CuentaCorrienteController@store')->name('store');
    
    Route::get('/ventas', 'VentasController@index')->name('index');
    Route::post('/ventas','VentasController@store')->name('store');

    Route::post('/addCart','VentasController@addCart')->name('addCart');
    Route::post('/deleteCart','VentasController@deleteCart')->name('deleteCart');
        
    Route::get('/pedidosAll','VentasController@pedidosAll')->name('pedidosAll');
    Route::get('/pedidos','VentasController@pedidos')->name('pedidos');
    Route::post('/cambio_estado_venta','VentasController@cambioEstado')->name('cambioEstado');

});