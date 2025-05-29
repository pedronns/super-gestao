<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Cliente;

class PedidoController extends Controller
{
    // regras de validação

    private function regrasValidacao(): array
    {
        return [
            'cliente_id' => 'exists:clientes,id',
        ];
    }

    // feedback
    private function feedbackValidacao(): array
    {
        return [
            'cliente_id.exists' => 'O cliente informado não existe'
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pedidos = Pedido::paginate(10);
        return view('app.pedido.index', ['pedidos' => $pedidos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('app.pedido.create', ['clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->regrasValidacao(), $this->feedbackValidacao());
        $pedido = new Pedido();
        $pedido->cliente_id = $request->get('cliente_id');
        $pedido->save();

        return redirect()->route('app.pedido.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        return view('app.pedido.show', ['pedido' => $pedido]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        $clientes = Cliente::all();
        return view('app.pedido.edit', ['pedido' => $pedido, 'clientes' => $clientes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        $request->validate($this->regrasValidacao(), $this->feedbackValidacao());

        $pedido->update($request->all());
        return redirect()->route('app.pedido.show', ['pedido' => $pedido->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('app.pedido.index');
    }
}
