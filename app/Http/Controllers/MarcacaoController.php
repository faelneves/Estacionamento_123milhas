<?php

namespace App\Http\Controllers;

use App\Proprietario;
use App\Valor;
use App\Marcacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DateTime;

class MarcacaoController extends Controller
{
    //
    function __construct()
    {
    	date_default_timezone_set('america/sao_paulo');
    }

    public function listMarcacao()
    {
    	$data = $this->createData();
    	return View('home')->with('data', $data);
    }

    public function createData()
    {
    	$proprietarios = Proprietario::all();
    	$valores = Valor::all();
    	$marcacaos = Marcacao::all(); 
    	$data['marcacoes'] = array();

    	foreach ($marcacaos as $marcacao) {
	    	$proprietario = $marcacao->proprietario()->first();
	    	$valor = $marcacao->valor()->first();
    		$data['marcacoes'][] = array_merge( $proprietario->attributesToArray(), $valor->attributesToArray(),$marcacao->attributesToArray(),);
    	}

    	$data['proprietarios'] = $proprietarios;
    	$data['valores'] = $valores;
    	return $data;
    }

    public function checkIn(Request $request)
    {
    	if ($request->placa && $request->idProprietario && $request->idValor) {
	    	$marcacao = new Marcacao();
			$marcacao->placa = $request->placa;
			$marcacao->idProprietario = $request->idProprietario;
			$marcacao->idValor = $request->idValor;
			$marcacao->entrada = date('Y-m-d H:i:s');

			$marcacao->save();
    	}else {
    		$this->alert('Preencha Todos os Campos Corretamente!');
    	}
		$data = $this->createData();
		return view('home')->with('data', $data);
    }

    public function checkOut($id)
    {
    	$marcacao = Marcacao::find($id);
    	$marcacao->saida = date('Y-m-d H:i:s');
    	$difMarcacao = (new DateTime($marcacao->entrada))->diff(new DateTime($marcacao->saida));
    	
    	$valor = $marcacao->valor()->first();
    	$marcacao->vrTotal = ($valor->vrFracao*$difMarcacao->h*4) + ($valor->vrFracao*floor($difMarcacao->i/4)) + ($valor->vrDia*$difMarcacao->d);

    	$marcacao->save();
 		$this->alert('valor total: R$'.$marcacao->vrTotal);
 		$data = $this->createData();
		return view('home')->with('data', $data);
    }



}
