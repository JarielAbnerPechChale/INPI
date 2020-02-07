<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleSalida extends Model
{
    protected $table='detalles_salidas';
	protected $primaryKey='id_detalle';
	protected $with=['salida'];
	public $incrementing=true;
	public $timestamps=false;

	protected $fillable=[

	'id_detalle',
	'id_salida'

	];

	public function salida(){
		return $this->belongsTo(Salida::class,'id_salida','id_salida');
	}

}
