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
            'nome.required' => 'O campo "Nome" precisa ser preenchido',
            'nome.min' => 'O campo "Nome" precisa ter pelo menos 3 caracteres',
            'nome.max' => 'O campo "Nome" deve ter até 100 caracteres',
            'nome.unique' => 'O nome informado já está em uso',

            'telefone.required' => 'O campo "Telefone" precisa ser preenchido',

            'email.required' => 'O campo "E-mail" precisa ser preenchido',
            'email.email' => 'O e-mail informado não existe',

            'motivo_contatos_id.required' => 'Por favor, informe o motivo do contato',

            'mensagem.required' => 'Escreva sua mensagem',
            'mensagem.max' => 'A mensagem deve ter até 1000 caracteres'
        ];

        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
