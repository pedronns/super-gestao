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
                            <th class="px-4 py-2 text-center font-semibold">Unidade ID</th>
                            <th class="px-4 py-2 text-center font-semibold">Comprimento</th>
                            <th class="px-4 py-2 text-center font-semibold">Largura</th>
                            <th class="px-4 py-2 text-center font-semibold">Altura</th>
                            <th class="px-4 py-2 text-center"></th>
                            <th class="px-4 py-2 text-center"></th>
                            <th class="px-4 py-2 text-center"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($produtos as $produto)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 whitespace-nowrap">{{ $produto->nome }}</td>
                                <td class="px-4 py-2 whitespace-nowrap">{{ $produto->descricao }}</td>
                                <td class="px-4 py-2 whitespace-nowrap">{{ $produto->fornecedor->nome }}</td>
                                <td class="px-4 py-2 text-center">{{ $produto->peso }}</td>
                                <td class="px-4 py-2 text-center">{{ $produto->unidade_id }}</td>
                                <td class="px-4 py-2 text-center">{{ $produto->produtoDetalhe->comprimento ?? '' }}</td>
                                <td class="px-4 py-2 text-center">{{ $produto->produtoDetalhe->largura ?? '' }}</td>
                                <td class="px-4 py-2 text-center">{{ $produto->produtoDetalhe->altura ?? '' }}</td>

                                {{-- Visualizar --}}
                                <td class="px-4 py-2 text-blue-600 cursor-pointer hover:underline text-center font-bold">
                                    <a href="{{ route('app.produto.show', ['produto' => $produto->id]) }}">Visualizar</a>
                                </td>

                                {{-- Excluir --}}
                                <td class="px-4 py-2 text-blue-600 cursor-pointer hover:underline text-center font-bold">
                                    <form method="post"
                                        action="{{ route('app.produto.destroy', ['produto' => $produto->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit">Excluir</button>
                                    </form>
                                </td>

                                {{-- Editar --}}
                                <td class="px-4 py-2 text-blue-600 cursor-pointer hover:underline text-center font-bold">
                                    <a href="{{ route('app.produto.edit', ['produto' => $produto->id]) }}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            {{ $produtos->links('vendor.pagination.tailwind') }}
        </div>

    </div>

@endsection
