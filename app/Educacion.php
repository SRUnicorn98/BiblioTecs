<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Educacion extends Model
{
    //
    protected $table = 'educacion';

    public function tipo_educacion()
    {
    	return $this->belongsTo('App\TipoEducacion', 'idTipoeducacion', 'id');

    }


         public function user()
    {
    	return $this->belongsTo('App\User', 'idUsuario', 'id');

    }
}
