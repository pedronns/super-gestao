@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    @vite('resources/css/app.css')

    <div class="conteudo-pagina">
        <div class="py-10 bg-[#2a9ee2] text-center">
            <h1 class="m-0 text-white text-[28px]">Lista de produtos</h1>
        </div>

        <div class="flex justify-center mt-6">
            <ul class="flex gap-4">
                <li>
                    <a href="{{ route('app.produto.create') }}" class="text-[#333] hover:text-[#268fd0]">Novo</a>
                </li>
            </ul>
        </div>




        <div class="flex justify-center mt-8">
            <div class="overflow-x-auto">
                <table
                    class="min-w-full border border-gray-300 divide-y divide-gray-200 shadow-sm rounded-lg overflow-hidden mb-2">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-2 text-center font-semibold">Nome</th>
                            <th class="px-4 py-2 text-center font-semibold">Descrição</th>
                            <th class="px-4 py-2 text-center font-semibold">Fornecedor</th>
                            <th class="px-4 py-2 text-center font-semibold">Peso</th>
                            <th class="px-4 py-2 text-center font-semibold">Unidade</th>
                            <th class="px-4 py-2 text-center font-semibold">Comprimento</th>
                            <th class="px-4 py-2 text-center font-semibold">Largura</th>
                            <th class="px-4 py-2 text-center font-semibold">Altura</th>
                            <th class="px-4 py-2 text-center font-semibold">Detalhes</th> {{-- nova coluna --}}
                            <th class="px-4 py-2 text-center"></th> {{-- Visualizar --}}
                            <th class="px-4 py-2 text-center"></th> {{-- Excluir --}}
                            <th class="px-4 py-2 text-center"></th> {{-- Editar produto --}}
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @if ($produtos->count() > 0)
                            @foreach ($produtos as $produto)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-2 whitespace-nowrap">{{ $produto->nome }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap">{{ $produto->descricao }}</td>
                                    <td class="px-4 py-2 whitespace-nowrap">
                                        {{ $produto->fornecedor->nome ?? 'Sem fornecedor' }}</td>
                                    <td class="px-4 py-2 text-center">{{ $produto->peso }}</td>
                                    <td class="px-4 py-2 text-center">{{ $produto->unidade->unidade ?? 'Sem Unidade' }}</td>

                                    {{-- Medidas se preenchidas / Botão para adicionar se vazias --}}
                                    @if (empty($produto->produtoDetalhe->comprimento) &&
                                            empty($produto->produtoDetalhe->largura) &&
                                            empty($produto->produtoDetalhe->altura))
                                        <td class="px-4 py-2 text-center" colspan="3">
                                            <a href="{{ route('app.produto-detalhe.create') }}?produto_id={{ $produto->id }}"
                                                class="text-green-600 hover:underline font-semibold">
                                                Adicionar detalhes
                                            </a>
                                        </td>
                                        <td class="px-4 py-2 text-center text-gray-400 italic">Sem detalhes</td>
                                    @else
                                        <td class="px-4 py-2 text-center">{{ $produto->produtoDetalhe->comprimento }}</td>
                                        <td class="px-4 py-2 text-center">{{ $produto->produtoDetalhe->largura }}</td>
                                        <td class="px-4 py-2 text-center">{{ $produto->produtoDetalhe->altura }}</td>
                                        <td class="px-4 py-2 text-center">
                                            <a href="{{ route('app.produto-detalhe.edit', ['produto_detalhe' => $produto->produtoDetalhe->id]) }}"
                                                class="text-blue-600 hover:underline font-semibold">
                                                Editar detalhes
                                            </a>
                                        </td>
                                    @endif

                                    {{-- Visualizar --}}
                                    <td
                                        class="px-4 py-2 text-blue-600 cursor-pointer hover:underline text-center font-bold">
                                        <a
                                            href="{{ route('app.produto.show', ['produto' => $produto->id]) }}">Visualizar</a>
                                    </td>

                                    {{-- Excluir --}}
                                    <td
                                        class="px-4 py-2 text-blue-600 cursor-pointer hover:underline text-center font-bold">
                                        <form method="post"
                                            action="{{ route('app.produto.destroy', ['produto' => $produto->id]) }}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit">Excluir</button>
                                        </form>
                                    </td>

                                    {{-- Editar --}}
                                    <td
                                        class="px-4 py-2 text-blue-600 cursor-pointer hover:underline text-center font-bold">
                                        <a href="{{ route('app.produto.edit', ['produto' => $produto->id]) }}">Editar</a>
                                    </td>
                                </tr>

                                <tr class="hover:bg-gray-50">
                                    <td colspan="12" class="text-center">
                                        @if ($produto->pedidos->isNotEmpty())
                                            <p class="font-semibold mb-1">ID dos pedidos</p>
                                            @foreach ($produto->pedidos as $pedido)
                                                <a href="{{ route('app.pedido-produto.create', ['pedido' => $pedido->id]) }}"
                                                    class="text-blue-600 hover:underline">
                                                    {{ $pedido->id }}@if (!$loop->last)
                                                        ,
                                                    @endif
                                                </a>
                                            @endforeach
                                        @else
                                            <p class="text-gray-500 italic">Vazia</p>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="11" class="px-4 py-6 text-center text-gray-500">
                                    Não há produtos a serem exibidos.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>

            </div>
        </div>

        <div>
            {{ $produtos->links('vendor.pagination.tailwind') }}
        </div>

    </div>

@endsection
