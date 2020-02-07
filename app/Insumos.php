<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumos extends Model
{
    protected $table='insumos';
	protected $primaryKey='id_insumo';
	protected $with=['dEntra','dSali','tipo'];
	public $incrementing=true;
	public $timestamps=false;

	protected $fillable=[
		'id_insumo',
		'nombre',
		'cantidad',
		'precio',
		'id_tipo',
		'id_detalle',
		'fecha_caducidad',
		'id_detalle_entrada'

	];

	public function dEntra(){
		return $this->belongsTo(DetalleEntrada::class,'id_detalle_entrada','id_detalle_entrada');
	}
	public function dSali(){
		return $this->belongsTo(DetalleSalida::class,'id_detalle','id_detalle');
	}
	public function tipo(){
		return $this->belongsTo(TipoInsumo::class,'id_tipo','id_tipo');
	}
}
