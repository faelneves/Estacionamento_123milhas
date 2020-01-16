<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Valor;

class ValorsController extends Controller
{
    public function showValors(){
    	$valores = Valor::all();
        return View('ValorsView',compact('valores'));
    }

    public function createValor(Request $request)
    {
    	if ($request->modelo && $request->vrDia && $request->vrFracao) {
            $valor = new Valor();
        	$valor->modelo = $request->modelo;
        	$valor->vrDia = $request->vrDia;
        	$valor->vrFracao = $request->vrFracao;
        	$valor->save();
            $this->alert('Tipo Cadastrado com sucesso!');
            return redirect()->route('listagem-marcacao');
        } else{
            $this->alert('Preencha Todos os Campos Corretamente!');
            return redirect()->route('showValors');
        }

    }

    public function deleteValor($id)
    {
        $valor = Valor::find($id);
        $valor->delete();
        return redirect()->route('showValors');
    }
}
