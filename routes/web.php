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
//Alumnos
Route::view('admin','admin.admin');
Route::view('alumnos','alumnos');
//Escuelas
Route::view('escuelas','escuelas.escuelas');
Route::view('escuela','escuelas.escuela');
//Tutores
Route::view('repre','representantes.representantes');
Route::view('rep','representantes.representanteED');
//Perfil
Route::view('perfil','perfil');
Route::view('perfilEd','login.usuario');
Route::view('/','login.login');
//Proveedores
Route::view('provee','proveedores.proveedor');
Route::view('pro','proveedores.proveedores');
//Empleado
Route::view('coci','empleados.empleado');
Route::view('empleadoED','empleados.empleadoEd');




       //Insumos
Route::view('entrada','insumos.entradainsumo');
Route::view('salida','insumos.salidainsumo');
Route::view('alma','insumos.almacen');



//ZONAS APIS
//Alumno
Route::apiResource('apiAlumno','ApiAlumnoController');
//Escuela
Route::apiResource('apiEscuela','ApiEscuelaController');
//Representantes
Route::apiResource('apiRep','ApiRepresentanteController');
//Usuario
Route::apiResource('apiUsuario','ApiUsuarioController');
//Proveedores
Route::apiResource('apiProveedor','ApiProveedorController');
//Insumos
Route::apiResource('apiIns','ApiInsumosController');
//Login
Route::post('login','AccesoController@validar');
Route::get('logout','AccesoController@salir');
//Empleados
Route::apiResource('apiEmple','ApiEmpleadoController');