<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    // regras de validação

    private function regrasValidacao(): array
    {
        return [
            'nome' => 'required|min:3|max:50',
            'descricao' => 'required|min:3|max:200',
            'peso' => 'required|integer',
            'unidade_id' => 'required|exists:unidades,id',
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
            'descricao.max' => 'Descrição muito longa (máximo 200 caracteres).',

            'peso.integer' => 'O campo peso deve conter apenas números inteiros.',

            'unidade_id.exists' => 'A unidade selecionada não existe.',
            'unidade_id.required' => 'Informe a unidade.',
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $produtos = Produto::paginate(5);

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $unidades = Unidade::all();
        return view('app.produto.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->regrasValidacao(), $this->feedbackValidacao());

        Produto::create($request->all());
        return redirect()->route('app.produto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        return view('app.produto.edit', ['produto'=> $produto, 'unidades' => $unidades]);
        // return view('app.produto.create', ['produto' => $produto, 'unidades' => $unidades]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        $request->validate($this->regrasValidacao(), $this->feedbackValidacao());

        $produto->update($request->all());
        return redirect()->route('app.produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('app.produto.index');
    }
}
