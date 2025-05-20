@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
<div class="flex flex-col min-h-screen font-['Roboto',sans-serif] text-[#333]">
    <div class="py-10 bg-[#2a9ee2] text-center">
        <h1 class="m-0 text-white text-[28px]">Adicionar produto</h1>
    </div>

    <div class="flex justify-center mt-6">
        <ul class="flex gap-4">
            <li><a href="{{ route('app.produto.index') }}" class="text-[#333] hover:text-[#268fd0]">Voltar</a></li>
            <li><a href="#" class="text-[#333] hover:text-[#268fd0]">Consulta</a></li>
        </ul>
    </div>

    <div class="text-center mt-10">
        <div class="w-[30%] mx-auto">
            <form method="post" action="{{ route('app.produto.store') }}">
                @csrf

                {{-- Nome --}}
                <div class="relative mb-6">
                    <input 
                        type="text" 
                        name="nome" 
                        value="{{ old('nome') ?? '' }}" 
                        placeholder="Nome"
                        class="w-full p-[10px_15px] box-border rounded-[5px] bg-inherit text-[#333]
                               {{ $errors->has('nome') ? 'border border-red-500' : 'border border-[#333]' }}">
                    @if ($errors->has('nome'))
                        <div class="absolute top-[36px] right-[10px] bg-white p-1 text-xs text-red-600">
                            {{ $errors->first('nome') }}
                        </div>
                    @endif
                </div>

                {{-- Descrição --}}
                <div class="relative mb-6">
                    <input 
                        type="text" 
                        name="descricao" 
                        value="{{ old('descricao') ?? '' }}" 
                        placeholder="Descrição"
                        class="w-full p-[10px_15px] box-border rounded-[5px] bg-inherit text-[#333]
                               {{ $errors->has('descricao') ? 'border border-red-500' : 'border border-[#333]' }}">
                    @if ($errors->has('descricao'))
                        <div class="absolute top-[36px] right-[10px] bg-white p-1 text-xs text-red-600">
                            {{ $errors->first('descricao') }}
                        </div>
                    @endif
                </div>

                {{-- Peso --}}
                <div class="relative mb-6">
                    <input 
                        type="text" 
                        name="peso" 
                        value="{{ old('peso') ?? '' }}" 
                        placeholder="Peso"
                        class="w-full p-[10px_15px] box-border rounded-[5px] bg-inherit text-[#333]
                               {{ $errors->has('peso') ? 'border border-red-500' : 'border border-[#333]' }}">
                    @if ($errors->has('peso'))
                        <div class="absolute top-[36px] right-[10px] bg-white p-1 text-xs text-red-600">
                            {{ $errors->first('peso') }}
                        </div>
                    @endif
                </div>

                {{-- Unidade --}}
                <div class="relative mb-6">
                    <select name="unidade_id"
                        class="w-full p-[10px_15px] box-border rounded-[5px] bg-inherit text-[#333]
                               {{ $errors->has('unidade_id') ? 'border border-red-500' : 'border border-[#333]' }}">
                        <option value="" disabled {{ old('unidade_id') == null ? 'selected' : '' }}>Unidade de medida</option>
                        @foreach ($unidades as $unidade)
                            <option value="{{ $unidade->id }}" {{ (old('unidade_id') ?? '') == $unidade->id ? 'selected' : '' }}>
                                {{ $unidade->descricao }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('unidade_id'))
                        <div class="absolute top-[36px] right-[10px] bg-white p-1 text-xs text-red-600">
                            {{ $errors->first('unidade_id') }}
                        </div>
                    @endif
                </div>

                <button type="submit" class="w-full p-[10px_15px] my-[10px] rounded-[3px] bg-[#7ab829] text-white hover:bg-[#6ea22c]">
                    Cadastrar
                </button>
            </form>

            @if ($msg ?? '')
                <div class="text-sm text-[#2a9ee2] mt-4">
                    {{ $msg }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
