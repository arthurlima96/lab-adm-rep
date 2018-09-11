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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/usuarios', 'Auth\RegisterController@showRegistrationFormUsers')->name('cadastro_users')->middleware('auth');
//Route::get('/tableUsers', 'Auth\RegisterController@showTableUsers')->name('table_users')->middleware('auth');

Route::get('lab_computadores/{id}', 'LaboratorioController@todos_computadores')->name('lab_computadores');

Route::post('reservar/{id}', 'ReservaController@efetuar_reserva')->name('reservar');
Route::post('terminar/{id}', 'ReservaController@encerrar_reserva')->name('terminar');

Route::resource('/usuarios','UsuarioController')->middleware('auth');
Route::resource('/laboratorios','LaboratorioController')->middleware('auth');
Route::resource('/computadores','ComputadorController')->middleware('auth');



