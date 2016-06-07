<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home.index');
})->name('home');

// Authentication routes...
Route::get('login', 'AuthController@index')->name('login');     //Esta ruta pide los datos del usuario
Route::post('login', 'AuthController@store')->name('login');    //Esta ruta Inicia la session del usuario

// Rutas para los usuarios registrados
Route::group(['middleware' => 'auth'], function () {

    Route::get('logout', 'AuthController@destroy')->name('logout');     //Esta ruta pedira confirmacion para cerrar session
    Route::post('logout', 'AuthController@destroy')->name('logout');    //esta ruta cerrara la session del usuario
    Route::get('admin', 'AdminController@begin')->name('begin');

    //los Roles de los usuarios se usan como rutas
    Route::get('admin', 'AdminController@admin')->name('admin');
    Route::get('docente', 'AdminController@docente')->name('docente');
    Route::get('alumno', 'AdminController@alumno')->name('alumno');
    Route::get('padres', 'AdminController@padres')->name('padres');
});