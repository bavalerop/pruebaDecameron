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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Acomodacion
Route::get('/acomodacion','AcomodacionController@index');
Route::post('/acomodacion','AcomodacionController@create');
Route::get('/acomodacion/{id?}','AcomodacionController@show');
Route::put('/acomodacion/{id?}','AcomodacionController@update');
Route::delete('/acomodacion/{id?}','AcomodacionController@delete');
//Asignacion de acomodacion
Route::get('/asigAcomodacion','AsigAcomodacionController@index');
Route::post('/asigAcomodacion','AsigAcomodacionController@create');
Route::get('/asigAcomodacion/{id?}','AsigAcomodacionController@show');
Route::put('/asigAcomodacion/{id?}','AsigAcomodacionController@update');
Route::delete('/AsigAcomodacion/{id?}','AsigAcomodacionController@delete');
//Ciudades
Route::get('/ciudad','CiudadController@index');
Route::post('/ciudad','CiudadController@create');
Route::get('/ciudad/{id?}','CiudadController@show');
Route::put('/ciudad/{id?}','CiudadController@update');
Route::delete('/ciudad/{id?}','CiudadController@delete');
//Hoteles
Route::get('/hotel','HotelController@index');
Route::post('/hotel','HotelController@create');
Route::get('/hotel/{id?}','HotelController@show');
Route::put('/hotel/{id?}','HotelController@update');
Route::delete('/hotel/{id?}','HotelController@delete');
//Tipo de habitacion
Route::get('/thab','TipoHabController@index');
Route::post('/thab','TipoHabController@create');
Route::get('/thab/{id?}','TipoHabController@show');
Route::put('/thab/{id?}','TipoHabController@update');
Route::delete('/thab/{id?}','TipoHabController@delete');
