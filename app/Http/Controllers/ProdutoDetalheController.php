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
            'comprimento' => 'required|integer',
            'largura' => 'required|integer',
            'altura' => 'required|integer',
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
];
    }

    public function index()
    {
        //
    }

    public function create(Request $request)
    {
        $produto_id = $request->get('produto_id');
        $produto = \App\Models\Produto::findOrFail($produto_id);

        $produto_detalhe = new \App\Models\ProdutoDetalhe(); // objeto vazio
        $unidades = Unidade::all();

        return view('app.produto_detalhe.create', [
            'unidades' => $unidades,
            'produto' => $produto,
            'produto_detalhe' => $produto_detalhe, // para evitar erros na view
        ]);
    }

    public function store(Request $request)
    {
        $request->validate($this->regrasValidacao(), $this->feedbackValidacao());

        // Busca o produto para pegar a unidade_id
        $produto = \App\Models\Produto::findOrFail($request->input('produto_id'));

        ProdutoDetalhe::create([
            'produto_id' => $request->input('produto_id'),
            'comprimento' => $request->input('comprimento'),
            'largura' => $request->input('largura'),
            'altura' => $request->input('altura'),
            'unidade_id' => $produto->unidade_id,
        ]);

        return redirect()->route('app.produto.index');
    }
    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $produto_detalhe = ProdutoDetalhe::with('produto')->findOrFail($id);
        $unidades = Unidade::all();

        return view('app.produto_detalhe.edit', [
            'produto_detalhe' => $produto_detalhe,
            'produto' => $produto_detalhe->produto,
            'unidades' => $unidades
        ]);
    }

    public function update(Request $request, ProdutoDetalhe $produto_detalhe)
    {
        $regras = [
        'comprimento' => 'required|integer',
        'largura' => 'required|integer',
        'altura' => 'required|integer',
        'unidade_id' => 'required|exists:unidades,id',
    ];

        $request->validate($regras, $this->feedbackValidacao());

        $produto_detalhe->update($request->all());

        return redirect()->route('app.produto.index');
    }

    public function destroy(string $id)
    {
        //
    }
}
