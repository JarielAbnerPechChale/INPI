<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
	protected $table='usuarios';
    protected $primaryKey='id_usuario';
    public $incrementing=true;
    public $timestamps=false;

    protected $fillable=[
    	'id_usuario',
    	'nombre',
    	'apellido_p',
    	'apellido_m',
    	'correo',
    	'usuario',
    	'contrasenia'
    ];
}
