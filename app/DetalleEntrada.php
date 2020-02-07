<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleEntrada extends Model
{

  	protected $table='detalles_entrada';
	protected $primaryKey='id_detalle_entrada';
	protected $with=['entrada'];
	public $incrementing=true;
	public $timestamps=false;

	protected $fillable=[

	'id_detalle_entrada',
	'id_entrada'

	];

	public function entrada(){
		return $this->belongsTo(Entrada::class,'id_entrada','id_entrada');
	}

}
