<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }

    public function listar() {
        return view('app.fornecedor.listar');
    }

    public function adicionar(Request $request) {
        if($request->input('_token') != '') {

            $regras = [
                'nome' => 'required|min:3|max:10',
                'site' => 'required',
                'uf' => 'required',
                'email' => 'email'
            ];

            $feedback = [
                'required' => 'Informe o :attribute.',

                'nome.min' => 'Nome muito curto.',
                'nome.max' => 'Nome muito longo.',


                'uf.required' => 'Informe o UF.',

                'email.email' => 'Digite um email válido.'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());
        }

        return view('app.fornecedor.adicionar');
    }
}
