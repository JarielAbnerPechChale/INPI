<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Representante;

class ApiRepresentanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return Representante::all();
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
        $rep=new Representante;
        $rep->id_representante=$request->get('id_representante');
        $rep->nombre=$request->get('nombre');
        $rep->apellido_p=$request->get('apellido_p');
        $rep->apellido_m=$request->get('apellido_m');
        $rep->celular=$request->get('celular');
        
        $rep->save();
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
        $rep=Representante::find($id);
        return $rep;
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

        $rep=Representante::find($id);

        $rep->id_representante=$request->post('id_representante');
        $rep->nombre=$request->post('nombre');
        $rep->apellido_p=$request->post('apellido_p');
        $rep->apellido_m=$request->post('apellido_m');
        $rep->celular=$request->post('celular');
        
     
        $rep->update();
        

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
        return Representante::destroy($id);
    }

}
