<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidade;
use App\Models\ProdutoDetalhe;
use App\Models\ItemDetalhe;

class ProdutoDetalheController extends Controller
{
    // regras de validação
    private function regrasValidacao(): array
    {
        return [
            'produto_id' => 'required|integer|exists:produtos,id|unique:produto_detalhes,produto_id',
            'comprimento' => 'required|integer',
            'largura' => 'required|integer',
            'altura' => 'required|integer',
            'unidade_id' => 'required|exists:unidades,id',
        ];
    }

    // feedback
    private function feedbackValidacao(): array
    {
        return [
            'required' => 'Informe a :attribute.',
            'integer' => 'Apenas números inteiros.',

            'produto_id.required' => 'Informe o ID do produto.',
            'produto_id.exists' => 'Produto não encontrado.',
            'produto_id.unique' => 'Este produto já possui detalhes.',

            'comprimento.required' => 'Informe o comprimento.',
            'largura.required' => 'Informe a largura.',
            'altura.required' => 'Informe a altura.',

            'unidade_id.required' => 'Informe a unidade.',
            'unidade_id.exists' => 'A unidade selecionada não existe.',
];
    }

    public function index()
    {
        //
    }

    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto_detalhe.create', ['unidades' => $unidades]);
    }

    public function store(Request $request)
    {
        $request->validate($this->regrasValidacao(), $this->feedbackValidacao());

        ProdutoDetalhe::create($request->all());
        echo 'Cadastro realizado';
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $produto_detalhe = ItemDetalhe::find($id);
        $unidades = Unidade::all();
        return view('app.produto_detalhe.edit', ['produto_detalhe' => $produto_detalhe, 'unidades' => $unidades]);
    }

    public function update(Request $request, ProdutoDetalhe $produto_detalhe)
    {
        $produto_detalhe->update($request->all());
        echo 'Atualização realizada';
    }

    public function destroy(string $id)
    {
        //
    }
}
