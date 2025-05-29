<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Fornecedor;
use App\Models\Item;
use App\Models\Unidade;
use App\Models\ProdutoDetalhe;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    // regras
    private function regrasValidacao(): array
    {
        return [
            'nome' => 'required|min:3|max:50',
            'descricao' => 'required|min:3|max:200',
            'peso' => 'required|integer',
            'unidade_id' => 'required|exists:unidades,id',
            'fornecedor_id' => 'required|exists:fornecedores,id',
        ];
    }

    // feedback
    private function feedbackValidacao(): array
    {
        return [
            'required' => 'Informe o :attribute.',
            'descricao.required' => 'Informe a descrição.',

            'nome.min' => 'Nome muito curto (mínimo 3 caracteres).',
            'nome.max' => 'Nome muito longo (máximo 50 caracteres).',

            'descricao.min' => 'Descrição muito curta (mínimo 3 caracteres).',
            'descricao.max' => 'Descrição muito longa (máximo :max caracteres).',

            'peso.integer' => 'O campo peso deve conter apenas números inteiros.',

            'unidade_id.exists' => 'A unidade selecionada não existe.',
            'unidade_id.required' => 'Informe a unidade.',

            'fornecedor_id.exists' => 'O fornecedor selecionado não existe.',
            'fornecedor_id.required' => 'Informe o fornecedor.',
        ];
    }

    public function index(Request $request)
    {
        $produtos = Item::paginate(10);

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    public function create(Request $request)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    public function store(Request $request)
    {
        $request->validate($this->regrasValidacao(), $this->feedbackValidacao());

        Item::create($request->all());
        return redirect()->route('app.produto.index');
    }

    public function show(Produto $produto)
    {
        $fornecedor = Fornecedor::where('id', $produto->fornecedor_id)->first();
        return view('app.produto.show', ['produto' => $produto, 'fornecedor' => $fornecedor]);
    }

    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();

        return view('app.produto.edit', ['produto'=> $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    public function update(Request $request, Item $produto)
    {
        $request->validate($this->regrasValidacao(), $this->feedbackValidacao());

        $produto->update($request->all());
        return redirect()->route('app.produto.show', ['produto' => $produto->id]);
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('app.produto.index');
    }
}
