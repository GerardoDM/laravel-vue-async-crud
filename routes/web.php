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

// Route::get('/', function () {
//     return 'Hola Mund';
// });

//Route::get('/', 'PruebaController@index');


// Route::match(['post', 'get' , 'patch'],'/{nombre}/{sexo?}/{edad?}', 'Prueba\PruebaController@index')->where([
//     'nombre' => '[a-zA-Z]+' , 'sexo' => '[a-zA-Z]+' , 'edad' => '[1-9]+']);

Route::post("info", "Prueba\PruebaController@info");

Route::post("datos", "Prueba\PruebaController@datos");

Route::get("formularioDos, Prueba\PruebaController@index2");

Route::get("formulario", "Prueba\PruebaController@formulario");
Route::get("formularioDos", "Prueba\PruebaController@formularioDos");

Route::match(['post', 'delete'],'/crear/token', "HomeController@index")->middleware('auth');

//Route::resource('components' , 'PruebaController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
