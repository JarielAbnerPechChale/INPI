<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
 	protected $table='proveedores';
    protected $primaryKey='id_proveedor';
    public $incrementing=true;
    //por defecto Laravel pide de dos métodos create y update, como no los
    //tenemoscreados utilizamos la variable timestamp en false para indicar 
    //que no contamos con la variable.
    public $timestamps=false;

    protected $fillable=[
    	'id_proveedor',
    	'nombre'
    ];
}
