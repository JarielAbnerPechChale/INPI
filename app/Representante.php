<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Representante extends Model
{
    
    protected $table='representantes';
    protected $primaryKey='id_representante';
    public $incrementing=true;
    //por defecto Laravel pide de dos métodos create y update, como no los
    //tenemoscreados utilizamos la variable timestamp en false para indicar 
    //que no contamos con la variable.
    public $timestamps=false;

    protected $fillable=[
    	'id_representante',
    	'nombre',
    	'apellido_p',
    	'apellido_m',
        'celular'
    ];
}
