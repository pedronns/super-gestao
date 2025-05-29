@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')

    @vite('resources/css/app.css')


    <div class="py-10 bg-[#2a9ee2] text-center">
        <h1 class="m-0 text-white text-[28px]">Lista de clientes</h1>
    </div>

    <div class="flex justify-center mt-6">
        <ul class="flex gap-4">
            <li>
                <a href="{{ route('app.cliente.create') }}" class="text-[#333] hover:text-[#268fd0]">Novo</a>
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
                        <th class="px-4 py-2 text-center"></th>
                        <th class="px-4 py-2 text-center"></th>
                        <th class="px-4 py-2 text-center"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @if ($clientes->count() > 0)
                        @foreach ($clientes as $cliente)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 whitespace-nowrap">{{ $cliente->nome }}</td>

                                {{-- Visualizar --}}
                                <td class="px-4 py-2 text-blue-600 cursor-pointer hover:underline text-center font-bold">
                                    <a href="{{ route('app.cliente.show', ['cliente' => $cliente->id]) }}">Visualizar</a>
                                </td>

                                {{-- Excluir --}}
                                <td class="px-4 py-2 text-blue-600 cursor-pointer hover:underline text-center font-bold">
                                    <form method="post"
                                        action="{{ route('app.cliente.destroy', ['cliente' => $cliente->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit">Excluir</button>
                                    </form>
                                </td>

                                {{-- Editar --}}
                                <td class="px-4 py-2 text-blue-600 cursor-pointer hover:underline text-center font-bold">
                                    <a href="{{ route('app.cliente.edit', ['cliente' => $cliente->id]) }}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                                Não há clientes a serem exibidos.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>

        </div>
    </div>

    <div>
        {{ $clientes->links('vendor.pagination.tailwind') }}
    </div>



@endsection
