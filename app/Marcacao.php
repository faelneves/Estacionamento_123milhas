<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marcacao extends Model
{
    //
    protected $table = 'marcacaos';

	public function proprietario()
	{
		return $this->hasOne(Proprietario::class, 'id' , 'idProprietario');
	}

	public function valor()
	{
		return $this->hasOne(Valor::class, 'id' , 'idValor');
	}
}
