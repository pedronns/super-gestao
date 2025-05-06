<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function contato (Request $request) {

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {
        $regras = [
            'nome' => 'required|min:3|max:100|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'required|email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            'nome.required' => 'Obrigatório',
            'nome.min' => 'Mín. 3 caracteres',
            'nome.max' => 'Máx. 100 caracteres',
            'nome.unique' => 'Nome já usado',

            'telefone.required' => 'Obrigatório',

            'email.required' => 'Obrigatório',
            'email.email' => 'E-mail inválido',

            'motivo_contatos_id.required' => 'Escolha um motivo',

            'mensagem.required' => 'Digite a mensagem',
            'mensagem.max' => 'Máx. 1000 caracteres'
        ];

        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
