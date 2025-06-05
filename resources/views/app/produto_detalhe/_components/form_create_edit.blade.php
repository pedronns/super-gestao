@if (!empty($produto_detalhe) && isset($produto_detalhe->id))
    <form method="post" action="{{ route('app.produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('app.produto-detalhe.store') }}">
        @csrf
@endif

    {{-- Produto ID (oculto) --}}
    <input type="hidden" name="produto_id" value="{{ $produto->id }}">

    {{-- Comprimento --}}
    <div class="relative mb-6">
        <input
            type="text"
            name="comprimento"
            value="{{ old('comprimento', $produto_detalhe->comprimento ?? '') }}"
            placeholder="Comprimento"
            class="w-full p-[10px_15px] box-border rounded-[5px] bg-inherit text-[#333]
                {{ $errors->has('comprimento') ? 'border border-red-500' : 'border border-[#333]' }}"
        >
        @if ($errors->has('comprimento'))
            <div class="absolute top-[32px] right-[10px] bg-white p-1 text-xs text-red-600">
                {{ $errors->first('comprimento') }}
            </div>
        @endif
    </div>

    {{-- Largura --}}
    <div class="relative mb-6">
        <input
            type="text"
            name="largura"
            value="{{ old('largura', $produto_detalhe->largura ?? '') }}"
            placeholder="Largura"
            class="w-full p-[10px_15px] box-border rounded-[5px] bg-inherit text-[#333]
                {{ $errors->has('largura') ? 'border border-red-500' : 'border border-[#333]' }}"
        >
        @if ($errors->has('largura'))
            <div class="absolute top-[32px] right-[10px] bg-white p-1 text-xs text-red-600">
                {{ $errors->first('largura') }}
            </div>
        @endif
    </div>

    {{-- Altura --}}
    <div class="relative mb-6">
        <input
            type="text"
            name="altura"
            value="{{ old('altura', $produto_detalhe->altura ?? '') }}"
            placeholder="Altura"
            class="w-full p-[10px_15px] box-border rounded-[5px] bg-inherit text-[#333]
                {{ $errors->has('altura') ? 'border border-red-500' : 'border border-[#333]' }}"
        >
        @if ($errors->has('altura'))
            <div class="absolute top-[32px] right-[10px] bg-white p-1 text-xs text-red-600">
                {{ $errors->first('altura') }}
            </div>
        @endif
    </div>

    <button
        type="submit"
        class="w-full p-[10px_15px] my-[10px] rounded-[3px] bg-[#7ab829] text-white hover:bg-[#6ea22c]"
    >
        {{ isset($produto_detalhe->id) ? 'Atualizar' : 'Cadastrar' }}
    </button>
</form>
