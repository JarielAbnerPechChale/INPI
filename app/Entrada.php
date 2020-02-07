<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    //
    protected $table='entradas';
    //Definimos la llave primaria
    protected $primaryKey='id_entrada';

    protected $with=['proveedor'];
    //Definimos las columnas
    public $incrementing=true;
    //por defecto Laravel pide de dos métodos create y update, como no los
    //tenemoscreados utilizamos la variable timestamp en false para indicar 
    //que no contamos con la variable.
    public $timestamps=true;

    protected $fillable=[
    	'id_entrada',
    	'fecha_entrada',
        'id_proveedor'
    ];


    public function proveedor(){
        return $this->belongsTo(Proveedor::class,'id_proveedor','id_proveedor');
    }
}
