<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request) {
        
        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->get();

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);
    }

    public function adicionar(Request $request) {

        $msg = '';

        if($request->input('_token') != '') {

            $regras = [
                'nome' => 'required|min:3|max:50',
                'site' => 'required',
                'uf' => 'required',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'Informe o :attribute.',

                'nome.min' => 'Nome muito curto (3).',
                'nome.max' => 'Nome muito longo (50).',


                'uf.required' => 'Informe o estado.',

                'email.email' => 'Digite um email válido.'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Cadastro realizado com sucesso!';
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }
}
