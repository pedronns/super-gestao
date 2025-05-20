@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    @vite('resources/css/app.css')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>
                Lista de produtos
            </h1>
        </div>

        <div class="flex justify-center">
            <ul class="flex items-center">
                <li>
                    <a href="{{ route('app.produto.create') }}">Novo</a>
                </li>
                <li>
                    <a href="">Consulta</a>
                </li>
            </ul>
        </div>


        <div class="informacao-pagina">
            <div class="flex justify-center mt-8">
                <table
                    class="min-w-full border border-gray-300 divide-y divide-gray-200 shadow-sm rounded-lg overflow-hidden mb-2">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="w-1/5 px-4 py-2 text-center font-semibold">Nome</th>
                            <th class="w-2/5 px-4 py-2 text-center font-semibold">Descrição</th>
                            <th class="w-1/6 px-4 py-2 text-center font-semibold">Peso</th>
                            <th class="w-1/6 px-4 py-2 text-center font-semibold">Unidade ID</th>
                            <th class="w-12 px-4 py-2 text-center"></th>
                            <th class="w-12 px-4 py-2 text-center"></th>
                            <th class="w-12 px-4 py-2 text-center"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($produtos as $produto)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $produto->nome }}</td>
                                <td class="px-4 py-2">{{ $produto->descricao }}</td>
                                <td class="px-4 py-2">{{ $produto->peso }}</td>
                                <td class="px-4 py-2">{{ $produto->unidade_id }}</td>

                                {{-- Visualizar --}}
                                <td class="px-4 py-2 text-red-600 cursor-pointer hover:underline">
                                    <a href="{{ route('app.produto.show', ['produto' => $produto->id]) }}"
                                        class="text-blue-600 font-bold hover:underline">Visualizar</a>
                                </td>

                                {{-- Excluir --}}
                                <td class="px-4 py-2 text-red-600 cursor-pointer hover:underline">
                                    <form method="post" action="{{route('app.produto.destroy', ['produto' => $produto->id])}}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="text-blue-600 font-bold hover:underline">Excluir</button>
                                        {{-- <a href="" class="text-blue-600 font-bold hover:underline">Excluir</a> --}}
                                    </form>
                                </td>

                                {{-- Editar --}}
                                <td class="px-4 py-2">
                                    <a href="{{ route('app.produto.edit', ['produto' => $produto->id]) }}"
                                        class="text-blue-600 font-bold hover:underline">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div>
                {{ $produtos->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>

@endsection
