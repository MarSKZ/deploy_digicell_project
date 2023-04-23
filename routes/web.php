<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=> 'api'], function(){
    Route::post('/login','UserController@login');
    Route::apiResource('/users','UserController');
    Route::apiResource('/cajaMovimientos','CajaMovimientoController');
    Route::apiResource('/cajas','CajaController');
    Route::post('/articuloImages/articulo/{articulo}','ArticuloImageController@store');
    Route::post('/articuloImages/articulo/delete/{articuloImage}','ArticuloImageController@destroy');
    Route::get('/articuloImages/articulo/{articulo}','ArticuloImageController@show');
    Route::apiResource('/marcas', 'MarcaController');
    Route::apiResource('/modelos','ModeloController');
    Route::apiResource('/medidas','MedidaController');
    Route::apiResource('/categorias','CategoriaController');
    Route::apiResource('/documentos','DocumentoController');
    Route::apiResource('/articulos', 'ArticuloController');
    Route::get('/inventarios/kardex/{articulo}','InventarioController@kardex'); //que apunte a kardex
    Route::apiResource('/inventarios','InventarioController');
    Route::apiResource('/compras','CompraController');
    Route::apiResource('/ventas','VentaController');
    Route::apiResource('/sucursals','SucursalController');
    Route::get('/dashboard', 'DashboardController@info');
}); //delante de cada ruta le va a agregar api
//para acceder a cada ruta antes de la direccion debe poner api



Route::get('/', function () {
    return view('welcome');
});
