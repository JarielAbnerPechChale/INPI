<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Alumno;

class ApiAlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //conectarse a la base de datos y traer los datos
     // $alumnos=DB::select("SELECT id_alumno,nombre,apellido_p,apellido_m,id_escuela FROM alumnos");
     //    return $alumnos;
        return Alumno::all();
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
        $alumno=new Alumno;
        $alumno->id_alumno=$request->get('id_alumno');
        $alumno->nombre=$request->get('nombre');
        $alumno->apellido_p=$request->get('apellido_p');
        $alumno->apellido_m=$request->get('apellido_m');
        $alumno->edad=$request->get('edad');
        $alumno->sexo=$request->get('sexo');
        $alumno->curp=$request->get('curp');
        $alumno->direccion=$request->get('direccion');
        $alumno->cruzamiento=$request->get('cruzamiento');

        $alumno->id_escuela=$request->get('id_escuela');
     
        $alumno->save();
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
        $alumno=Alumno::find($id);
        return $alumno;
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

        $alumno=Alumno::find($id);

        $alumno->id_alumno=$request->post('id_alumno');
        $alumno->nombre=$request->post('nombre');
        $alumno->apellido_p=$request->post('apellido_p');
        $alumno->apellido_m=$request->post('apellido_m');
        $alumno->edad=$request->post('edad');
        $alumno->sexo=$request->post('sexo');
        $alumno->curp=$request->post('curp');
        $alumno->direccion=$request->post('direccion');
        $alumno->cruzamiento=$request->post('cruzamiento');

        $alumno->id_escuela=$request->post('id_escuela');
     
        $alumno->update();
        

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
        return Alumno::destroy($id);
    }

}
