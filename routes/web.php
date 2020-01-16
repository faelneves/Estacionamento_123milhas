<?php

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



//Rotas Valores
Route::get('/showValors', 'ValorsController@showValors')->name('showValors');
Route::post('/createValor', 'ValorsController@createValor')->name('createValor');
Route::get('/deleteValor/{id}','ValorsController@deleteValor')->name('deleteValor');
//Rotas Marcacao
Route::get('/', 'MarcacaoController@listMarcacao')->name('listagem-marcacao');
Route::post('/checkIn', 'MarcacaoController@checkIn')->name('checkIn');
Route::get('/checkOut/{id}', 'MarcacaoController@checkOut')->name('checkOut');
//Rotas Proprietarios
Route::get('/showProprietarios', 'ProprietarioController@showProprietarios')->name('showProprietarios');
Route::post('/createProprietario', 'ProprietarioController@createProprietario')->name('createProprietario');
Route::get('/deleteProprietario/{id}','ProprietarioController@deleteProprietario')->name('deleteProprietario');

Route::namespace('API')->name('api.')->group(function(){
	Route::prefix('proprietarios')->group(function(){
		Route::get('/','ProprietarioController@index')->name('index_proprietarios');
		Route::get('/{id}','ProprietarioController@show')->name('single_proprietarios');

		Route::post('/','ProprietarioController@setProprietario')->name('set_proprietarios');
		Route::put('/{id}','ProprietarioController@updateProprietario')->name('update_proprietarios');
		Route::delete('/{id}','ProprietarioController@deleteProprietario')->name('delete_proprietarios');

	});
});