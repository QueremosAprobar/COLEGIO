<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */
//
Route::resource('apoderados','ApoderadoController');
Route::resource('alumnos','AlumnoController');
Route::resource('viewalumnos','ViewAlumnoController');


Route::resource('docentes','DocenteController');
Route::resource('aulas','AulaController');
Route::resource('asignaciones','AsignacionController');
Route::resource('cursos','CursoController');
Route::resource('anios','AnioController');


Route::get('/', 'InicioController@index');
Route::get('inicio', 'InicioController@index');
Route::get('about', 'InicioController@about');
Route::get('contact', 'InicioController@contact');
Route::get('layout', 'InicioController@layout');
Route::resource('matriculas','AlumnoController1');
Route::resource('listamatriculas','MatriculaDeController');
Route::resource('mantenimientos','MatriculaDeController');


//
//Route::get('/',function () {
//    return view('layout.layout');
//});

Auth::routes();

Route::get('/home', 'HomeController@index');
