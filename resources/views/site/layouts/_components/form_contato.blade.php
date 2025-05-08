<form action={{ route('site.contato') }} method="post">
    @csrf

    <div class="input-container">
        <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome"
            class={{ $errors->any('nome') ? 'borda-vermelha' : $classe }}>
            
        @if ($errors->any('nome'))
            <div class={{$erro}}>
                {{ $errors->has('nome') ? $errors->first('nome') : '' }}
            </div>
        @endif
    </div>

    <div class="input-container">
        <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone"
            class={{ $errors->any('telefone') ? 'borda-vermelha' : $classe }}>

        @if ($errors->any('telefone'))
            <div class={{$erro}}>
                {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
            </div>
        @endif
    </div>

    <div class="input-container">
        <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail"
            class={{ $errors->any('email') ? 'borda-vermelha' : $classe}}>

        @if ($errors->any('email'))
            <div class={{$erro}}>
                {{ $errors->has('email') ? $errors->first('email') : '' }}
            </div>
        @endif
    </div>

    <div class="input-container">
        <select name="motivo_contatos_id"
            class={{ $errors->any('motivo_contatos_id') ? 'borda-vermelha' : $classe }}>
            <option value="" disabled {{ old('motivo_contatos_id') ? '' : 'selected' }}>Qual o motivo do contato?</option>
            @foreach ($motivo_contatos as $key => $motivo_contato)
                <option value="{{ $motivo_contato->id }}"
                    {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}>
                    {{ $motivo_contato->motivo_contato }}
                </option>
            @endforeach
        </select>

        @if ($errors->any('motivo_contatos_id'))
            <div class={{$erro}}>
                {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : '' }}
            </div>
        @endif
    </div>

    <div class="textarea-container">
        <textarea style="resize: none" name="mensagem" class={{ $errors->any('mensagem') ? 'borda-vermelha' : $classe }}
            placeholder="Preencha aqui a sua mensagem">{{ old('mensagem') }}</textarea>
        
        @if ($errors->any('mensagem'))
            <div class={{$erro}}>
                {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}
            </div>
        @endif
    </div>

    <button type="submit" class={{ $classe }}>ENVIAR</button>
</form>
