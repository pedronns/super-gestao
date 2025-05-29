@if (isset($produto->id))
    <form method="post" action="{{ route('app.produto.update', ['produto' => $produto->id]) }}">
        @csrf
        @method('PUT')
    @else
        <form method="post" action="{{ route('app.produto.store') }}">
            @csrf
@endif

{{-- Fornecedor --}}
<div class="relative mb-6">
    <select name="fornecedor_id"
        class="w-full p-[10px_15px] box-border rounded-[5px] bg-inherit text-[#333]
            {{ $errors->has('fornecedor_id') ? 'border border-red-500' : 'border border-[#333]' }}">
        <option value="" disabled {{ old('fornecedor_id') == null ? 'selected' : '' }}>Fornecedor
        </option>
        @foreach ($fornecedores as $fornecedor)
            <option value="{{ $fornecedor->id }}"
                {{ (old('fornecedor_id') ?? $produto->fornecedor_id ?? '') == $fornecedor->id ? 'selected' : '' }}>
                {{ $fornecedor->nome }}
            </option>
        @endforeach
    </select>
    @if ($errors->has('fornecedor_id'))
        <div class="absolute top-[28px] right-[10px] bg-white p-1 text-xs text-red-600">
            {{ $errors->first('fornecedor_id') }}
        </div>
    @endif
</div>


{{-- Nome --}}
<div class="relative mb-6">
    <input type="text" name="nome" value="{{ $produto->nome ?? (old('nome') ?? '') }}" placeholder="Nome"
        class="w-full p-[10px_15px] box-border rounded-[5px] bg-inherit text-[#333]
            {{ $errors->has('nome') ? 'border border-red-500' : 'border border-[#333]' }}">
    @if ($errors->has('nome'))
        <div class="absolute top-[32px] right-[10px] bg-white p-1 text-xs text-red-600">
            {{ $errors->first('nome') }}
        </div>
    @endif
</div>

{{-- Descrição --}}
<div class="relative mb-6">
    <input type="text" name="descricao" value="{{ $produto->descricao ?? (old('descricao') ?? '') }}"
        placeholder="Descrição"
        class="w-full p-[10px_15px] box-border rounded-[5px] bg-inherit text-[#333]
            {{ $errors->has('descricao') ? 'border border-red-500' : 'border border-[#333]' }}">
    @if ($errors->has('descricao'))
        <div class="absolute top-[32px] right-[10px] bg-white p-1 text-xs text-red-600">
            {{ $errors->first('descricao') }}
        </div>
    @endif
</div>

{{-- Peso --}}
<div class="relative mb-6">
    <input type="text" name="peso" value="{{ $produto->peso ?? (old('peso') ?? '') }}" placeholder="Peso"
        class="w-full p-[10px_15px] box-border rounded-[5px] bg-inherit text-[#333]
            {{ $errors->has('peso') ? 'border border-red-500' : 'border border-[#333]' }}">
    @if ($errors->has('peso'))
        <div class="absolute top-[32px] right-[10px] bg-white p-1 text-xs text-red-600">
            {{ $errors->first('peso') }}
        </div>
    @endif
</div>

{{-- Unidade --}}
<div class="relative mb-6">
    <select name="unidade_id"
        class="w-full p-[10px_15px] box-border rounded-[5px] bg-inherit text-[#333]
            {{ $errors->has('unidade_id') ? 'border border-red-500' : 'border border-[#333]' }}">
        <option value="" disabled {{ old('unidade_id') == null ? 'selected' : '' }}>Unidade de
            medida</option>
        @foreach ($unidades as $unidade)
            <option value="{{ $unidade->id }}"
                {{ $produto->unidade_id ?? (old('unidade_id') ?? '') == $unidade->id ? 'selected' : '' }}>
                {{ $unidade->descricao }}
            </option>
        @endforeach
    </select>
    @if ($errors->has('unidade_id'))
        <div class="absolute top-[28px] right-[10px] bg-white p-1 text-xs text-red-600">
            {{ $errors->first('unidade_id') }}
        </div>
    @endif
</div>

<button type="submit" class="w-full p-[10px_15px] my-[10px] rounded-[3px] bg-[#7ab829] text-white hover:bg-[#6ea22c]">
    {{ isset($produto->id) ? 'Atualizar' : 'Cadastrar' }}
</button>
</form>
