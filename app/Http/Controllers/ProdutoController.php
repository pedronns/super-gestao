<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
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
        return view ('app.produto.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $regras = [
            'nome' => 'required|min:3|max:50',
            'descricao' => 'required|min:3|max:200',
            'peso' => 'required|integer',
            'unidade_id' => 'required|exists:unidades,id',
        ];

        $feedback = [
            'required' => 'Informe o :attribute.',
            'descricao.required' => 'Informe a descrição.',
            
            'nome.min' => 'Nome muito curto (3).',
            'nome.max' => 'Nome muito longo (50).',

            'descricao.min' => 'Descrição muito curta (3).',
            'desccicao.max' => 'Descrição muito longa (200).',

            'peso.integer' => 'Apenas números inteiros.',

            'unidade_id.exists' => 'A unidade não existe.',
            'unidade_id.required' => 'Informe a unidade.'
        ];

        $request->validate($regras, $feedback);

        Produto::create($request->all());
        return redirect()->route('app.produto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {   
        return view ('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        //
    }
}
