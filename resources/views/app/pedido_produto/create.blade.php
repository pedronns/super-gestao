@extends('app.layouts.basico')

@section('titulo', 'Pedido Produto')

@section('conteudo')
    <div class="flex flex-col min-h-screen font-['Roboto',sans-serif] text-[#333]">
        <div class="py-10 bg-[#2a9ee2] text-center">
            <h1 class="m-0 text-white text-[28px]">Adicionar Produtos ao pedido</h1>
        </div>

        <div class="flex justify-center mt-6">
            <ul class="flex gap-4">
                <li><a href="{{ route('app.pedido.index') }}" class="text-[#333] hover:text-[#268fd0]">Voltar</a></li>
            </ul>
        </div>


        <div class="w-[30%] mx-auto text-center mt-10">

            <h2 class="text-2xl font-bold text-gray-900 mb-2">
                Detalhes do pedido
            </h2>
            <p class="text-base text-gray-600">
                ID: {{ $pedido->id }}
            </p>
            <p class="text-base text-gray-600 mb-6">
                Cliente: {{ $pedido->cliente_id }}
            </p>

            <h2 class="text-2xl font-bold text-gray-900 mb-2">
                Itens do pedido
            </h2>


            @if ($pedido->produtos->isNotEmpty())
                <table class="min-w-full table-auto border border-gray-300 rounded-lg shadow-sm mb-6">
                    <thead>
                        <tr class="bg-gray-100 text-gray-700">
                            <th class="px-4 py-2 border-b border-gray-400 text-center align-middle">ID</th>
                            <th class="px-4 py-2 border-b border-gray-400 text-center align-middle">Produto</th>
                            <th class="px-4 py-2 border-b border-gray-400 text-center align-middle">Data de inclusão</th>
                            <th class="px-4 py-2 border-b border-gray-400 text-center align-middle"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido->produtos as $produto)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border-b border-gray-200 text-center align-middle">{{ $produto->id }}
                                </td>
                                <td class="px-4 py-2 border-b border-gray-200 text-center align-middle">{{ $produto->nome }}
                                </td>
                                <td class="px-4 py-2 border-b border-gray-200 text-center align-middle">
                                    {{ $produto->pivot->created_at->format('d/m/Y') }}
                                </td>
                                <td class="px-4 py-2 border-b border-gray-200 text-center align-middle">
                                    <form id="form_{{ $pedido->id }}_{{ $produto->id }}" method="post"
                                        action="{{ route('app.pedido-produto.destroy', ['pedido' => $pedido->id, 'produto' => $produto->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#"
                                            onclick="document.getElementById('form_{{ $pedido->id }}_{{ $produto->id }}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-gray-500 italic mb-6">Este pedido não possui produtos vinculados.</p>
            @endif



            @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
            @endcomponent

            @if ($msg ?? '')
                <div class="text-sm text-[#2a9ee2] mt-4">
                    {{ $msg }}
                </div>
            @endif
        </div>

    </div>
@endsection
