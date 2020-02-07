<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table='empleados';
	protected $primaryKey='id_empleado';
	public $incrementing=true;
	public $timestamps=false;

	protected $fillable=[
		'id_empleado',
		'nombre',
		'apellidop',
		'apellidom',
		'celular'
	];
}
