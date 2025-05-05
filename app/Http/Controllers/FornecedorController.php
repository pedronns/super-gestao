<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = [
           0 => [
            'nome' => 'Fornecedor 1',
            'status' => 'S',
            'cnpj' => '0',
            'ddd' => '11',
            'telefone' => '987654321'
            ],
            1 => [
            'nome' => 'Fornecedor 2',
            'status' => 'N',
            'cnpj' => '000.00.000/0000',
            'ddd' => '85',
            'telefone' => '987654333'
            ],
            2 => [
            'nome' => 'Fornecedor 3',
            'status' => 'N',
            'cnpj' => null,
            'ddd' => '32', 
            'telefone' => '987654444'
            ],
        ];

        // echo isset($fornecedores[1]['cnpj']) ? 'CNPJ Informado' : 'CNPJ não informado'; 
        
        return view('app.fornecedor.index', compact('fornecedores'));
        
    }
}
