<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/v1')->namespace('Api')->group(function(){

    //Rotas Interessados
    Route::resource('/interessados', 'InteressadosController'); //api/v1/interessados

    //Rotas Imoveis
    Route::resource('/imoveis', 'ImoveisController'); //api/v1/imoveis
    Route::get('/imoveis/{id}/interessados', 'ImoveisController@interessados');

    //Rotas de Busca de Imoveis
    Route::get('/buscar-imoveis', 'BuscarImoveisController@index'); //api/v1/buscar-imoveis

    //Rotas de Busca de Interessados
    Route::get('/buscar-interessados', 'BuscarInteressadosController@index'); //api/v1/buscar-interessados
});
