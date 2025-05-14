@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

@vite('resources/css/app.css')

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>    
            Fornecedor - Lista
        </h1>
    </div>

    <div class="menu">
        <ul>
            <li>
                <a href="{{{route('app.fornecedor.adicionar')}}}">Novo</a>
                <a href="{{{route('app.fornecedor')}}}">Consulta</a>
            </li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div class="flex justify-center mt-8">
            <table class="min-w-full border border-gray-300 divide-y divide-gray-200 shadow-sm rounded-lg overflow-hidden mb-2">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2  text-left font-semibold">Nome</th>
                        <th class="px-4 py-2 text-left font-semibold">Site</th>
                        <th class="px-4 py-2 text-left font-semibold">Estado</th>
                        <th class="px-4 py-2 text-left font-semibold">E-mail</th>
                        <th class="px-4 py-2"></th>
                        <th class="px-4 py-2"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($fornecedores as $fornecedor )
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $fornecedor->nome }}</td>
                            <td class="px-4 py-2">{{ $fornecedor->site }}</td>
                            <td class="px-4 py-2">{{ $fornecedor->uf }}</td>
                            <td class="px-4 py-2">{{ $fornecedor->email }}</td>
                            <td class="px-4 py-2 text-red-600 cursor-pointer hover:underline">Excluir</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}" class="text-blue-600 hover:underline">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
            <div>
                {{$fornecedores->links('vendor.pagination.tailwind')}}
            </div>
    </div>
</div>

@endsection
