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

Route::middleware('auth:api')->prefix('v1')->group(function(){
    // Route::post('profile', 'Api\v1\ApiController@profile')->name('api.profile'); 
    Route::prefix('bancos')->group(function () {
        Route::post('inserir', 'Api\v1\Bancos\BancosController@inserir')->name('api.bancos.inserir');   
        Route::post('ativacao', 'Api\v1\Bancos\BancosController@gerenciarAtivacao')->name('api.bancos.ativacao'); 
        
    });

    Route::prefix('servicos')->group(function () {
        Route::post('inserir', 'Api\v1\Servicos\ServicosController@inserir')->name('api.servicos.inserir');    
        Route::post('ativacao', 'Api\v1\Servicos\ServicosController@gerenciarAtivacao')->name('api.servicos.ativacao');    
    });

    Route::prefix('criptomoedas')->group(function () {
        Route::post('inserir', 'Api\v1\Criptomoedas\CriptomoedasController@inserir')->name('api.criptomoedas.inserir');    
        Route::post('ativacao', 'Api\v1\Criptomoedas\CriptomoedasController@gerenciarAtivacao')->name('api.criptomoedas.ativacao');    
    });
});
    
Route::prefix('v1')->group(function () {
    Route::prefix('bancos')->group(function () {
        Route::post('buscar', 'Api\v1\Bancos\BancosController@buscar')->name('api.bancos.buscar');     
    });

    Route::prefix('servicos')->group(function () {
        Route::post('buscar', 'Api\v1\Servicos\ServicosController@buscar')->name('api.servicos.buscar');
    });

    Route::prefix('criptomoedas')->group(function () {
        Route::post('buscar', 'Api\v1\Criptomoedas\CriptomoedasController@buscar')->name('api.criptomoedas.buscar');
    });

    Route::prefix('token')->group(function(){
        Route::post('getToken', 'Api\v1\Token\TokenController@getToken')->name('api.token.getToken');
    });

    Route::prefix('login')->group(function(){
        Route::post('registrar', 'Api\v1\Token\TokenController@registrar')->name('api.login.registrar');
    });

});
