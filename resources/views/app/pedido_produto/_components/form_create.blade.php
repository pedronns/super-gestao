<form method="post" action="{{ route('app.pedido-produto.store', ['pedido' => $pedido]) }}">
    @csrf

    {{-- Produto --}}
    <div class="relative mb-6">
        <select name="produto_id"
            class="w-full p-[10px_15px] box-border rounded-[5px] bg-inherit text-[#333]
            {{ $errors->has('produto_id') ? 'border border-red-500' : 'border border-[#333]' }}">
            <option value="" disabled {{ old('produto_id') == null ? 'selected' : '' }}>Produto
            </option>
            @foreach ($produtos as $produto)
                <option value="{{ $produto->id }}" {{ old('produto_id') == $produto->id ? 'selected' : '' }}>
                    {{ $produto->nome }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('produto_id'))
            <div class="absolute top-[28px] right-[10px] bg-white p-1 text-xs text-red-600">
                {{ $errors->first('produto_id') }}
            </div>
        @endif
    </div>

    {{-- Quantidade --}}
    <div class="relative mb-6">
        <input type="number" name="quantidade" value="{{ old('quantidade') ?? (old('quantidade') ?? '') }}" placeholder="Quantidade"
            class="w-full p-[10px_15px] box-border rounded-[5px] bg-inherit text-[#333]
            {{ $errors->has('quantidade') ? 'border border-red-500' : 'border border-[#333]' }}">
        @if ($errors->has('quantidade'))
            <div class="absolute top-[32px] right-[10px] bg-white p-1 text-xs text-red-600">
                {{ $errors->first('quantidade') }}
            </div>
        @endif
    </div>

    <button type="submit"
        class="w-full p-[10px_15px] my-[10px] rounded-[3px] bg-[#7ab829] text-white hover:bg-[#6ea22c]">
        {{ isset($pedido->id) ? 'Atualizar' : 'Cadastrar' }}
    </button>
</form>
