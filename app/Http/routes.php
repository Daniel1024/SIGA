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

    Route::get('logout', 'AuthController@destroy')->name('logout');     //Esta ruta pedirá confirmación para cerrar session
    Route::post('logout', 'AuthController@destroy')->name('logout');    //esta ruta cerrara la session del usuario
    Route::get('admin', 'AdminController@begin')->name('begin');

    //Grupos de rutas para el menu
    Route::group(['prefix' => 'menu'], function () {
        //Menu
        Route::get('crear', 'MenuController@create')->name('crear_menu');
        Route::post('crear', 'MenuController@crear')->name('crear_menu');
        Route::get('editar', 'MenuController@create')->name('editar_menu');
        Route::get('eliminar', 'MenuController@create')->name('eliminar_menu');
        Route::get('relleno', 'MenuController@relleno')->name('relleno_menu');
        Route::get('api/{id}', 'MenuController@getPadres');
        Route::get('api/{usuario}/{menu}/{padre}', 'MenuController@getOrden');
        Route::get('{id}', 'MenuController@index')->name('menu')->where('id', '[0-9]+');
    });

    //Grupos para el admin
    Route::group(['prefix' => 'admin'], function () {
        //los Roles de los usuarios se usan como rutas
        Route::get('/', 'AdminController@role')->name('admin');
    });

    //Grupos para el docente
    Route::group(['prefix' => 'docente'], function () {
        //los Roles de los usuarios se usan como rutas
        Route::get('/', 'AdminController@role')->name('docente');
    });

    //Grupos para el alumno
    Route::group(['prefix' => 'alumno'], function () {
        //los Roles de los usuarios se usan como rutas
        Route::get('/', 'AdminController@role')->name('alumno');
    });

    //Grupos para el padres
    Route::group(['prefix' => 'padres'], function () {
        //los Roles de los usuarios se usan como rutas
        Route::get('/', 'AdminController@role')->name('padres');
    });

    //Grupos para los request de ajax
    Route::group(['prefix' => 'api'], function () {

    });
});