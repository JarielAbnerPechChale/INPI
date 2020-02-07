<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class ApiUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Usuario::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $usuario=new Usuario;
        $usuario->id_usuario=$request->get('id_usuario');
        $usuario->nombre=$request->get('nombre');
        $usuario->apellido_p=$request->get('apellido_p');
        $usuario->apellido_m=$request->get('apellido_m');
        $usuario->correo=$request->get('correo');
        $usuario->usuario=$request->get('usuario');
        $usuario->contrasenia=$request->get('contrasenia');

     
        $usuario->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario=Usuario::find($id);
        return $usuario;
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
        
            $usuario=Usuario::find($id);

        
        $usuario->nombre=$request->post('nombre');
        $usuario->apellido_p=$request->post('apellido_p');
        $usuario->apellido_m=$request->post('apellido_m');
        $usuario->correo=$request->post('correo');
        $usuario->usuario=$request->post('usuario');
        $usuario->contrasenia=$request->post('contrasenia');
        
     
        $usuario->update();
        
        

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
  
    }

}
