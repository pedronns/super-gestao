<form action={{ route('site.contato') }} method="post"
    class="flex flex-col w-full mx-auto bg-white p-6 rounded shadow">
    @csrf

    <div class="relative mb-4">
        <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome"
            class="w-full p-[10px_15px] rounded-[3px] border {{ $errors->has('nome') ? 'border-red-500' : 'border-gray-300' }} bg-white text-gray-800">
        @if ($errors->has('nome'))
            <div class="{{ $erro }} absolute right-2 top-8 p-1 text-sm text-red-500 bg-white">
                {{ $errors->first('nome') }}
            </div>
        @endif
    </div>

    <div class="relative mb-4">
        <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone"
            class="w-full p-[10px_15px] rounded-[3px] border {{ $errors->has('telefone') ? 'border-red-500' : 'border-gray-300' }} bg-white text-gray-800">
        @if ($errors->has('telefone'))
            <div class="{{ $erro }} absolute right-2 top-8 p-1 text-sm text-red-500 bg-white">
                {{ $errors->first('telefone') }}
            </div>
        @endif
    </div>

    <div class="relative mb-4">
        <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail"
            class="w-full p-[10px_15px] rounded-[3px] border {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }} bg-white text-gray-800">
        @if ($errors->has('email'))
            <div class="{{ $erro }} absolute right-2 top-8 p-1 text-sm text-red-500 bg-white">
                {{ $errors->first('email') }}
            </div>
        @endif
    </div>

    <div class="relative mb-4">
        <select name="motivo_contatos_id"
            class="w-full p-[10px_15px] rounded-[3px] border {{ $errors->has('motivo_contatos_id') ? 'border-red-500' : 'border-gray-300' }} bg-white text-gray-800">
            <option value="" disabled {{ old('motivo_contatos_id') ? '' : 'selected' }}>Qual o motivo do contato?
            </option>
            @foreach ($motivo_contatos as $motivo_contato)
                <option value="{{ $motivo_contato->id }}"
                    {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}>
                    {{ $motivo_contato->motivo_contato }}
                </option>
            @endforeach
        </select>
        @if ($errors->has('motivo_contatos_id'))
            <div class="{{ $erro }} absolute right-2 top-7 p-1 text-sm text-red-500 bg-white">
                {{ $errors->first('motivo_contatos_id') }}
            </div>
        @endif
    </div>

    <div class="relative mb-4">
        <textarea name="mensagem" placeholder="Preencha aqui a sua mensagem"
            class="w-full p-[10px_15px] rounded-[3px] border {{ $errors->has('mensagem') ? 'border-red-500' : 'border-gray-300' }} bg-white text-gray-800 resize-none"
            style="resize: none">{{ old('mensagem') }}</textarea>
        @if ($errors->has('mensagem'))
            <div class="{{ $erro }} absolute right-2 top-[55px] p-1 text-sm text-red-500 bg-white">
                {{ $errors->first('mensagem') }}
            </div>
        @endif
    </div>

    <button type="submit"
        class="w-full p-[10px_15px] rounded-[3px] bg-[#7ab829] text-white hover:bg-[#6ea22c] transition">
        ENVIAR
    </button>
</form>
