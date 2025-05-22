@if (isset($produto_detalhe->id))
    <form method="post" action="{{ route('app.produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('app.produto-detalhe.store') }}">
        @csrf
@endif

{{-- ID do produto --}}
<div class="relative mb-6">
    <input type="text" name="produto_id" value="{{ $produto_detalhe->produto_id ?? (old('produto_id') ?? '') }}"
        placeholder="ID do produto"
        class="w-full p-[10px_15px] box-border rounded-[5px] bg-inherit text-[#333]
        {{ $errors->has('produto_id') ? 'border border-red-500' : 'border border-[#333]' }}">
    @if ($errors->has('produto_id'))
        <div class="absolute top-[32px] right-[10px] bg-white p-1 text-xs text-red-600">
            {{ $errors->first('produto_id') }}
        </div>
    @endif
</div>

{{-- Comprimento --}}
<div class="relative mb-6">
    <input type="text" name="comprimento" value="{{ $produto_detalhe->comprimento ?? (old('comprimento') ?? '') }}"
        placeholder="Comprimento"
        class="w-full p-[10px_15px] box-border rounded-[5px] bg-inherit text-[#333]
        {{ $errors->has('comprimento') ? 'border border-red-500' : 'border border-[#333]' }}">
    @if ($errors->has('comprimento'))
        <div class="absolute top-[32px] right-[10px] bg-white p-1 text-xs text-red-600">
            {{ $errors->first('comprimento') }}
        </div>
    @endif
</div>

{{-- Largura --}}
<div class="relative mb-6">
    <input type="text" name="largura" value="{{ $produto_detalhe->largura ?? (old('largura') ?? '') }}"
        placeholder="Largura"
        class="w-full p-[10px_15px] box-border rounded-[5px] bg-inherit text-[#333]
            {{ $errors->has('largura') ? 'border border-red-500' : 'border border-[#333]' }}">
    @if ($errors->has('largura'))
        <div class="absolute top-[32px] right-[10px] bg-white p-1 text-xs text-red-600">
            {{ $errors->first('largura') }}
        </div>
    @endif
</div>

{{-- Altura --}}
<div class="relative mb-6">
    <input type="text" name="altura" value="{{ $produto_detalhe->altura ?? (old('altura') ?? '') }}"
        placeholder="Altura"
        class="w-full p-[10px_15px] box-border rounded-[5px] bg-inherit text-[#333]
            {{ $errors->has('altura') ? 'border border-red-500' : 'border border-[#333]' }}">
    @if ($errors->has('altura'))
        <div class="absolute top-[32px] right-[10px] bg-white p-1 text-xs text-red-600">
            {{ $errors->first('altura') }}
        </div>
    @endif
</div>

{{-- Unidade ID --}}
<div class="relative mb-6">
    <select name="unidade_id"
        class="w-full p-[10px_15px] box-border rounded-[5px] bg-inherit text-[#333]
            {{ $errors->has('unidade_id') ? 'border border-red-500' : 'border border-[#333]' }}">
        <option value="" disabled {{ old('unidade_id') == null ? 'selected' : '' }}>Unidade de
            medida</option>
        @foreach ($unidades as $unidade)
            <option value="{{ $unidade->id }}"
                {{ $produto_detalhe->unidade_id ?? (old('unidade_id') ?? '') == $unidade->id ? 'selected' : '' }}>
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
    {{ isset($produto_detalhe->id) ? 'Atualizar' : 'Cadastrar' }}
</button>
</form>
