<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Escuela;

class ApiEscuelaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // //conectarse a la base de datos y traer los datos
        // $escuelas=DB::select("SELECT id_escuela,nombre FROM escuelas");
        // return $escuelas;
        return Escuela::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $escuela=new Escuela;
        $escuela->id_escuela=$request->get('id_escuela');
        $escuela->nombre=$request->get('nombre');
        $escuela->clave_escuela=$request->get('clave_escuela');
        $escuela->direccion=$request->get('direccion');
        $escuela->cruzamiento=$request->get('cruzamiento');
     
        $escuela->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $escuela=Escuela::find($id);
        return $escuela;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Alumno::findOrfail($id)->update($request->all());

        $escuela=Escuela::find($id);

        $escuela->id_escuela=$request->post('id_escuela');
        $escuela->nombre=$request->post('nombre');
        $escuela->clave_escuela=$request->post('clave_escuela');
        $escuela->direccion=$request->post('direccion');
        $escuela->cruzamiento=$request->post('cruzamiento');
     
        $escuela->update();
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //es equivalente a un delete from table where id=2
        return Escuela::destroy($id);
    }

}
