<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Valor extends Model
{
    protected $table = 'valors';
    //

    public function setModeloAttribute($value)
    {
    	$this->attributes['modelo'] = $value;
    }

    public function setVrDiaAttribute($value)
    {
    	$this->attributes['vrDia'] = $value;
    }

    public function setVrFracaoAttribute($value)
    {
    	$this->attributes['vrFracao'] = $value;
    }
}
