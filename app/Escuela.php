<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escuela extends Model
{
    ////nombre de la tabla a utilizar
    protected $table='escuelas';
    //Definimos la llave primaria
    protected $primaryKey='id_escuela';
    //Definimos las columnas
    public $incrementing=true;
    //por defecto Laravel pide de dos métodos create y update, como no los
    //tenemoscreados utilizamos la variable timestamp en false para indicar 
    //que no contamos con la variable.
    public $timestamps=false;

    protected $fillable=[
    	'id_escuela',
    	'nombre',
    	'clave_escuela',
    	'direccion',
    	'cruzamiento'
    ];
}
