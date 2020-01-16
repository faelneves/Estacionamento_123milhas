<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Proprietario;

class ProprietarioController extends Controller
{

    public function showProprietarios()
    {
    	$proprietarios = Proprietario::all();
    	return view('ProprietariosView')->with(compact('proprietarios'));
    }

     public function createProprietario(Request $request)
    {
        if ($request->nome && $request->telefone && $request->email && $request->CPF) {
            $proprietario = new Proprietario();
            $proprietario->nome = $request->nome;
            $proprietario->telefone = $request->telefone;
            $proprietario->email = $request->email;
            $proprietario->CPF = $request->CPF;
            $proprietario->save();
            $this->alert('Proprietario Cadastrado com sucesso!');
            return redirect()->route('listagem-marcacao');
        } else{
            $this->alert('Preencha Todos os Campos Corretamente!');
            return redirect()->route('showProprietarios');
        }

    }

    public function deleteProprietario($id)
    {
        $proprietario = Proprietario::find($id);
        $proprietario->delete();
        return redirect()->route('showProprietarios');
    }
}
