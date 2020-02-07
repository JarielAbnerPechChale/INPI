<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    protected $table='salidas';
    protected $primaryKey='id_salida';
    protected $with=['empleado'];
    public $incrementing=true;
    public $timestamps=true;

    public $fillable=[
    	'id_salida',
    	'fecha_salida',
    	'motivo',
    	'id_empleado'
    ];

    public function empleado(){
    	return $this->belongsTo(Empleado::class,'id_empleado','id_empleado');
    }
}
