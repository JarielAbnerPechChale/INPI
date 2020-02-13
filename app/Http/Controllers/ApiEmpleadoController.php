<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;

class ApiEmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
        return Empleado::all();
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
        $empleado=new Empleado;
        $empleado->id_empleado=$request->get('id_empleado');
        $empleado->nombre=$request->get('nombre');
        $empleado->apellidop=$request->get('apellidop');
        $empleado->apellidom=$request->get('apellidom');
        $empleado->celular=$request->get('celular');
       
     
        $empleado->save();
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
        $empleado=Empleado::find($id);
        return $empleado;
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

        $empleado=Empleado::find($id);

        $empleado->nombre=$request->post('nombre');
        $empleado->apellidop=$request->post('apellidop');
        $empleado->apellidom=$request->post('apellidom');
        $empleado->celular=$request->post('celular');
       
      
     
        $empleado->update();
        

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
        return Empleado::destroy($id);
    }

}
