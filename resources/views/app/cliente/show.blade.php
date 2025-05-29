@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="py-10 bg-[#2a9ee2] text-center">
            <h1 class="m-0 text-white text-[28px]">Cliente</h1>
        </div>

        <div class="flex justify-center mt-6">
            <ul class="flex gap-4">
                <li><a href="{{ route('app.cliente.create') }}" class="text-[#333] hover:text-[#268fd0]">Novo</a></li>
                <li><a href="{{ route('app.cliente.index') }}" class="text-[#333] hover:text-[#268fd0]">Consulta</a></li>
            </ul>
        </div>

        <div class="max-w-4xl mx-auto mt-8 bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="w-full table-auto border-collapse">
                <tbody>
                    <tr class="border-b border-gray-200">
                        <td class="px-6 py-4 font-semibold text-gray-700 w-1/3">ID</td>
                        <td class="px-6 py-4 text-gray-600 break-words">{{ $cliente->id }}</td>
                    </tr>
                    <tr class="border-b border-gray-200">
                        <td class="px-6 py-4 font-semibold text-gray-700">Nome</td>
                        <td class="px-6 py-4 text-gray-600 break-words">{{ $cliente->nome }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection
