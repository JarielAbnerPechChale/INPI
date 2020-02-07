<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoInsumo extends Model
{
    protected $table='tipo_insumo';
    protected $primaryKey='id_tipo';
    public $incrementing=true;
    public $timestamps=false;
    protected $fillable=[
    	'id_tipo',
    	'nombre'
    ];
}
