@if (isset($cliente->id))
    <form method="post" action="{{ route('app.cliente.update', ['cliente' => $cliente->id]) }}">
        @csrf
        @method('PUT')
    @else
        <form method="post" action="{{ route('app.cliente.store') }}">
            @csrf
@endif


{{-- Nome --}}
<div class="relative mb-6">
    <input type="text" name="nome" value="{{ $cliente->nome ?? (old('nome') ?? '') }}" placeholder="Nome"
        class="w-full p-[10px_15px] box-border rounded-[5px] bg-inherit text-[#333]
            {{ $errors->has('nome') ? 'border border-red-500' : 'border border-[#333]' }}">
    @if ($errors->has('nome'))
        <div class="absolute top-[32px] right-[10px] bg-white p-1 text-xs text-red-600">
            {{ $errors->first('nome') }}
        </div>
    @endif
</div>

<button type="submit" class="w-full p-[10px_15px] my-[10px] rounded-[3px] bg-[#7ab829] text-white hover:bg-[#6ea22c]">
    {{ isset($cliente->id) ? 'Atualizar' : 'Cadastrar' }}
</button>
</form>
