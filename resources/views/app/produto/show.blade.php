@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>
                Produto
            </h1>
        </div>

        {{-- <div class="menu">
            <ul>
                <li>
                    <a href="{{ route('app.produto.index') }}">Voltar</a>
                    <a href="">Consulta</a>
                </li>
            </ul>
        </div> --}}

        <div class="flex justify-center mt-6">
            <ul class="flex gap-4">
                <li><a href="{{ route('app.produto.create') }}" class="text-[#333] hover:text-[#268fd0]">Novo</a></li>
                <li><a href="{{ route('app.produto.index') }}" class="text-[#333] hover:text-[#268fd0]">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div class="max-w-4xl mx-auto mt-8 bg-white shadow-lg rounded-lg overflow-hidden">
                <table class="w-full table-auto border-collapse">
                    <tbody>
                        <tr class="border-b border-gray-200">
                            <td class="px-6 py-4 font-semibold text-gray-700 w-1/3">ID</td>
                            <td class="px-6 py-4 text-gray-600 break-words">{{ $produto->id }}</td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td class="px-6 py-4 font-semibold text-gray-700">Nome</td>
                            <td class="px-6 py-4 text-gray-600 break-words">{{ $produto->nome }}</td>
                        </tr>
                        <tr class="border-b border-gray-200 align-top">
                            <td class="px-6 py-4 font-semibold text-gray-700">Descrição</td>
                            <td class="px-6 py-4 text-gray-600 break-words whitespace-normal">
                                {{ $produto->descricao }}
                            </td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td class="px-6 py-4 font-semibold text-gray-700">Peso</td>
                            <td class="px-6 py-4 text-gray-600 break-words">{{ $produto->peso }}</td>
                        </tr>
                        <tr class="border-b border-gray-200">
                            <td class="px-6 py-4 font-semibold text-gray-700">Unidade de medida</td>
                            <td class="px-6 py-4 text-gray-600 break-words">{{ $produto->unidade_id }}</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 font-semibold text-gray-700">Fornecedor</td>
                            <td class="px-6 py-4 text-gray-600 break-words">{{ $fornecedor->nome }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
