@extends('app.layouts.basico')

@section('titulo', 'Adicionar detalhes do produto')

@section('conteudo')
<div class="flex flex-col min-h-screen font-['Roboto',sans-serif] text-[#333]">
    <div class="py-10 bg-[#2a9ee2] text-center">
        <h1 class="m-0 text-white text-[28px]">Adicionar detalhes do produto</h1>
    </div>

    <div class="flex justify-center mt-6">
        <ul class="flex gap-4">
            <li><a href="{{route('app.produto.index')}}" class="text-[#333] hover:text-[#268fd0]">Voltar</a></li>
        </ul>
    </div>

    <div class="text-center mt-10">
        <h2 class="text-3xl font-bold text-gray-900 mb-2">
            {{ $produto->nome }}
        </h2>
        <p class="text-base text-gray-600 mb-6">
            {{ $produto->descricao }}
        </p>

        <div class="w-[30%] mx-auto">
            @component('app.produto_detalhe._components.form_create_edit', [
                'produto_detalhe' => $produto_detalhe,
                'produto' => $produto,
                'unidades' => $unidades,
            ])
            @endcomponent

            @if ($msg ?? '')
                <div class="text-sm text-[#2a9ee2] mt-4">
                    {{ $msg }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
