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



// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post("datos","Prueba\PruebaController@datosApi")->middleware('auth:api');

// CREATE

Route::post('persona', 'PersonasController@store');


// READ

Route::get('personas', 'PersonasController@index');


// UPDATE

Route::put('persona', 'PersonasController@update');

// DELETE

Route::delete('persona/{id}', 'PersonasController@destroy');



