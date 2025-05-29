@if (isset($pedido->id))
    <form method="post" action="{{ route('app.pedido.update', ['pedido' => $pedido->id]) }}">
        @csrf
        @method('PUT')
    @else
        <form method="post" action="{{ route('app.pedido.store') }}">
            @csrf
@endif

{{-- ID do cliente --}}
<div class="relative mb-6">
    <select name="cliente_id"
        class="w-full p-[10px_15px] box-border rounded-[5px] bg-inherit text-[#333]
            {{ $errors->has('cliente_id') ? 'border border-red-500' : 'border border-[#333]' }}">
        <option value="" disabled {{ old('cliente_id') == null ? 'selected' : '' }}>Cliente
        </option>
        @foreach ($clientes as $cliente)
            <option value="{{ $cliente->id }}"
                {{ (old('cliente_id') ?? $pedido->cliente_id ?? '') == $cliente->id ? 'selected' : '' }}>
                {{ $cliente->nome }}
            </option>
        @endforeach
    </select>
    @if ($errors->has('cliente_id'))
        <div class="absolute top-[28px] right-[10px] bg-white p-1 text-xs text-red-600">
            {{ $errors->first('cliente_id') }}
        </div>
    @endif
</div>

<button type="submit" class="w-full p-[10px_15px] my-[10px] rounded-[3px] bg-[#7ab829] text-white hover:bg-[#6ea22c]">
    {{ isset($pedido->id) ? 'Atualizar' : 'Cadastrar' }}
</button>
</form>
