@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')

    @vite('resources/css/app.css')


    <div class="py-10 bg-[#2a9ee2] text-center">
        <h1 class="m-0 text-white text-[28px]">Lista de pedidos</h1>
    </div>

    <div class="flex justify-center mt-6">
        <ul class="flex gap-4">
            <li>
                <a href="{{ route('app.pedido.create') }}" class="text-[#333] hover:text-[#268fd0]">Novo</a>
            </li>
        </ul>
    </div>

    <div class="flex justify-center mt-8">
        <div class="overflow-x-auto">
            <table
                class="min-w-full border border-gray-300 divide-y divide-gray-200 shadow-sm rounded-lg overflow-hidden mb-2">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-2 text-center font-semibold">ID do pedido</th>
                        <th class="px-4 py-2 text-center">Cliente</th>
                        <th class="px-4 py-2 text-center"></th>
                        <th class="px-4 py-2 text-center"></th>
                        <th class="px-4 py-2 text-center"></th>
                        <th class="px-4 py-2 text-center"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @if ($pedidos->count() > 0)
                        @foreach ($pedidos as $pedido)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 whitespace-nowrap">{{ $pedido->id }}</td>
                                <td class="px-4 py-2 whitespace-nowrap">{{ $pedido->cliente_id }}</td>

                                {{-- Adicionar produtos --}}
                                <td class="px-4 py-2 text-blue-600 cursor-pointer hover:underline text-center font-bold">
                                    <a href="{{ route('app.pedido-produto.create', ['pedido' => $pedido->id]) }}">Adicionar produtos</a>
                                </td>

                                {{-- Visualizar --}}
                                <td class="px-4 py-2 text-blue-600 cursor-pointer hover:underline text-center font-bold">
                                    <a href="{{ route('app.pedido.show', ['pedido' => $pedido->id]) }}">Visualizar</a>
                                </td>

                                {{-- Excluir --}}
                                <td class="px-4 py-2 text-blue-600 cursor-pointer hover:underline text-center font-bold">
                                    <form method="post"
                                        action="{{ route('app.pedido.destroy', ['pedido' => $pedido->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit">Excluir</button>
                                    </form>
                                </td>

                                {{-- Editar --}}
                                <td class="px-4 py-2 text-blue-600 cursor-pointer hover:underline text-center font-bold">
                                    <a href="{{ route('app.pedido.edit', ['pedido' => $pedido->id]) }}">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                                Não há pedidos a serem exibidos.
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <div>
        {{ $pedidos->links('vendor.pagination.tailwind') }}
    </div>



@endsection
