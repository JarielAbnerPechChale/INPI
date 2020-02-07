<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use Session;
use Redirect;
use Cache;
use Cookie;
class AccesoController extends Controller
{
    public function validar(Request $request){
    	// return 'HOLA';

    	// return Usuario::all();
    	$usuario=$request->usuario;
    	$contrasenia=$request->contrasenia;

    	$resp= Usuario::where('usuario', '=',$usuario)
    	->where('contrasenia','=', $contrasenia)
		->get();
        
        $user =$resp[0]->nombre;
        //Concatena el nombre con el apellido 
        // $user =$resp[0]->nombre.' '.$resp[0]->apellido_p;

		// return $resp;
        if (count($resp)>0){
            session::put('usuario',$user);
            session::put('rol',$resp[0]->rol);
   

            if($resp[0]->rol=="Administrador")
              return Redirect::to('alumnos');
            }

            else
                return "Usario y Contraseña incorrecta";
            
    }

    public function salir(){
        Session::flush();
        Session::reflash();
        Cache::flush();
        Cookie::forget('laravel_session');
        unset($_COOKIE);
        unset($_SESSION);

        return Redirect::to('/');
    }
}
