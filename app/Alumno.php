<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    //nombre de la tabla a utilizar
    protected $table='alumnos';
    //Definimos la llave primaria
    protected $primaryKey='id_alumno';

    protected $with=['x'];
    //Definimos las columnas
    public $incrementing=true;
    //por defecto Laravel pide de dos métodos create y update, como no los
    //tenemoscreados utilizamos la variable timestamp en false para indicar 
    //que no contamos con la variable.
    public $timestamps=false;

    protected $fillable=[
    	'id_alumno',
    	'nombre',
    	'apellido_p',
    	'apellido_m',
        'sexo',
        'edad',
        'curp',
        'direccion',
        'cruzamiento',
        'id_escuela'
    ];

    public function x(){
        return $this->belongsTo(Escuela::class,'id_escuela','id_escuela');
    }
}
