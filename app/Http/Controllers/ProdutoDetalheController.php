<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidade;
use App\Models\ProdutoDetalhe;

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

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidades = Unidade::all();
        return view('app.produto_detalhe.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->regrasValidacao(), $this->feedbackValidacao());

        ProdutoDetalhe::create($request->all());
        echo 'Cadastro realizado';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProdutoDetalhe $produto_detalhe)
    {
        $unidades = Unidade::all();
        return view('app.produto_detalhe.edit', ['produto_detalhe' => $produto_detalhe, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProdutoDetalhe $produto_detalhe)
    {
        $produto_detalhe->update($request->all());
        echo 'Atualização realizada';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
