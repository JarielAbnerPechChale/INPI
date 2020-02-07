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

//VISTAS
Route::view('inicio','layouts.masterlte');
Route::view('admin','admin.admin');
Route::view('escuelas','escuelas.escuelas');
Route::view('alumnos','alumnos');
Route::view('escuela','escuela');
Route::view('repre','representantes.representantes');
Route::view('rep','representanteED');
Route::view('perfil','perfil');
Route::view('perfilEd','login.usuario');
Route::view('/','login.login');
Route::view('provee','proveedor');
Route::view('pro','proveedores.proveedores');
       //Insumos
Route::view('entrada','insumos.entradainsumo');
Route::view('salida','insumos.salidainsumo');
Route::view('alma','insumos.almacen');



//ZONAS APIS
Route::apiResource('apiAlumno','ApiAlumnoController');
Route::apiResource('apiEscuela','ApiEscuelaController');
Route::apiResource('apiRep','ApiRepresentanteController');
Route::apiResource('apiUsuario','ApiUsuarioController');
Route::apiResource('apiProveedor','ApiProveedorController');
Route::apiResource('apiIns','ApiInsumosController');

Route::post('login','AccesoController@validar');
Route::get('logout','AccesoController@salir');

