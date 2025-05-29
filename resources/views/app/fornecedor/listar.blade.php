@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    @vite('resources/css/app.css')

    <div class="py-10 bg-[#2a9ee2] text-center">
        <h1 class="m-0 text-white text-[28px]">Fornecedor - Lista</h1>
    </div>

    <div class="flex justify-center mt-6">
        <ul class="flex gap-4">
            <li><a href="{{ route('app.fornecedor.adicionar') }}" class="text-[#333] hover:text-[#268fd0]">Novo</a></li>
            <li><a href="{{ route('app.fornecedor') }}" class="text-[#333] hover:text-[#268fd0]">Consulta</a></li>
        </ul>
    </div>

    <div class="flex justify-center mt-8">
        <table class="min-w-full border border-gray-300 divide-y divide-gray-200 shadow-sm rounded-lg overflow-hidden mb-2">
            <thead class="bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-4 py-2 text-center font-semibold">Nome</th>
                    <th class="px-4 py-2 text-center font-semibold">Site</th>
                    <th class="px-4 py-2 text-center font-semibold">Estado</th>
                    <th class="px-4 py-2 text-center font-semibold">E-mail</th>
                    <th class="px-4 py-2"></th> {{-- Excluir --}}
                    <th class="px-4 py-2"></th> {{-- Editar --}}
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($fornecedores as $fornecedor)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 text-center">{{ $fornecedor->nome }}</td>
                        <td class="px-4 py-2 text-center">{{ $fornecedor->site }}</td>
                        <td class="px-4 py-2 text-center">{{ $fornecedor->uf }}</td>
                        <td class="px-4 py-2 text-center">{{ $fornecedor->email }}</td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}"
                                class="text-[#333] hover:text-[#268fd0]">Excluir</a>
                        </td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}"
                                class="text-[#333] hover:text-[#268fd0]">Editar</a>
                        </td>
                    </tr>

                    <tr x-data="{ open: false }">
                        <td colspan="6" class="px-4 py-2 text-center">
                            <button @click="open = !open" class="text-sm text-[#268fd0] hover:underline inline-block">
                                <span x-text="open ? 'Ocultar produtos' : 'Ver produtos'"></span>
                            </button>

                            <div x-show="open" x-transition
                                class="mt-4 bg-gray-50 border border-gray-200 rounded-lg p-4 text-left max-w-full mx-auto">
                                <p class="font-semibold mb-2 text-gray-700">Lista de produtos</p>
                                <table class="w-full text-sm divide-y divide-gray-200">
                                    <thead class="bg-gray-100 text-gray-700">
                                        <tr>
                                            <th class="px-4 py-2 text-left font-semibold">ID</th>
                                            <th class="px-4 py-2 text-left font-semibold">Nome</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($fornecedor->produtos as $key => $produto)
                                            <tr>
                                                <td class="px-4 py-2 text-gray-600">{{ $produto->id }}</td>
                                                <td class="px-4 py-2 text-gray-600">{{ $produto->nome }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="2" class="px-4 py-2 text-gray-500 italic">Nenhum produto
                                                    cadastrado</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div>
        {{ $fornecedores->links('vendor.pagination.tailwind') }}
    </div>

@endsection
