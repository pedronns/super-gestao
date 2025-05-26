@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
<div class="flex flex-col min-h-screen font-['Roboto',sans-serif] text-[#333]">
    <div class="py-10 bg-[#2a9ee2] text-center">
        <h1 class="m-0 text-white text-[28px]">Fornecedor - Novo</h1>
    </div>

    <div class="flex justify-center mt-6">
        <ul class="flex gap-4">
            <li><a href="{{ route('app.fornecedor') }}" class="text-[#333] hover:text-[#268fd0]">Consulta</a></li>
        </ul>
    </div>

    <div class="text-center mt-10">
        <div class="w-[30%] mx-auto">
            <form method="post" action="{{ route('app.fornecedor.adicionar') }}">
                <input type="hidden" name="id" value="{{ $fornecedor->id ?? '' }}">
                @csrf

                {{-- Nome --}}
                <div class="relative mb-6">
                    <input 
                        type="text" 
                        name="nome" 
                        value="{{ $fornecedor->nome ?? old('nome') }}" 
                        placeholder="Nome"
                        class="w-full p-[10px_15px] box-border rounded-[5px] bg-inherit text-[#333] 
                               {{ $errors->has('nome') ? 'border border-red-500' : 'border border-[#333]' }}">
                    @if ($errors->has('nome'))
                        <div class="absolute top-[36px] right-[10px] bg-white p-1 text-xs text-red-600">
                            {{ $errors->first('nome') }}
                        </div>
                    @endif
                </div>

                {{-- Site --}}
                <div class="relative mb-6">
                    <input 
                        type="text" 
                        name="site" 
                        value="{{ $fornecedor->site ?? old('site') }}" 
                        placeholder="Site"
                        class="w-full p-[10px_15px] box-border rounded-[5px] bg-inherit text-[#333] 
                               {{ $errors->has('site') ? 'border border-red-500' : 'border border-[#333]' }}">
                    @if ($errors->has('site'))
                        <div class="absolute top-[36px] right-[10px] bg-white p-1 text-xs text-red-600">
                            {{ $errors->first('site') }}
                        </div>
                    @endif
                </div>

                {{-- UF --}}
                <div class="relative mb-6">
                    <select name="uf"
                        class="w-full p-[10px_15px] box-border rounded-[5px] bg-inherit text-[#333]
                               {{ $errors->has('uf') ? 'border border-red-500' : 'border border-[#333]' }}">
                        <option value="" disabled
                            {{ (old('uf') ?? ($fornecedor->uf ?? '')) == '' ? 'selected' : '' }}>
                            Estado
                        </option>
                        @foreach(['AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO'] as $estado)
                            <option value="{{ $estado }}" {{ (old('uf') ?? ($fornecedor->uf ?? '')) == $estado ? 'selected' : '' }}>
                                {{ $estado }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('uf'))
                        <div class="absolute top-[36px] right-[10px] bg-white p-1 text-xs text-red-600">
                            {{ $errors->first('uf') }}
                        </div>
                    @endif
                </div>

                {{-- Email --}}
                <div class="relative mb-6">
                    <input 
                        type="text" 
                        name="email" 
                        value="{{ $fornecedor->email ?? old('email') }}" 
                        placeholder="E-mail"
                        class="w-full p-[10px_15px] box-border rounded-[5px] bg-inherit text-[#333]
                               {{ $errors->has('email') ? 'border border-red-500' : 'border border-[#333]' }}">
                    @if ($errors->has('email'))
                        <div class="absolute top-[36px] right-[10px] bg-white p-1 text-xs text-red-600">
                            {{ $errors->first('email') }}
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
