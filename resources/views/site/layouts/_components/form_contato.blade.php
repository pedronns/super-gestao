{{ $slot }}


<form action={{ route('site.contato') }} method="post">
    @csrf

    <div class="input-container">

        <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome"
            class={{ $errors->any('nome') ? 'borda-vermelha' : $classe }}>
        <div class={{$erro}}>
            {{ $errors->has('nome') ? $errors->first('nome') : '' }}
        </div>
    </div>


    <div class="input-container">
        <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone"
            class={{ $errors->any('telefone') ? 'borda-vermelha' : $classe }}>
        <div class={{$erro}}>
            {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
        </div>
    </div>

    <div class="input-container">
        <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail"
            class={{ $errors->any('email') ? 'borda-vermelha' : $classe}}>
        <div class={{$erro}}>
            {{ $errors->has('email') ? $errors->first('email') : '' }}
        </div>
    </div>

    <div class="input-container">

        <select name="motivo_contatos_id"
            class={{ $errors->any('motivo_contatos_id') ? 'borda-vermelha' : $classe }}>
            <option selected>Qual o motivo do contato?</option>

            @foreach ($motivo_contatos as $key => $motivo_contato)
                <option value="{{ $motivo_contato->id }}"
                    {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}>
                    {{ $motivo_contato->motivo_contato }}</option>
            @endforeach
        </select>

        <div class={{$erro}}>
            {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : '' }}
        </div>
    </div>

    <div class="textarea-container">
        <textarea style="resize: none" name="mensagem" class={{ $errors->any('mensagem') ? 'borda-vermelha' : $classe }}
            placeholder="Preencha aqui a sua mensagem">
        </textarea>

    @if ($errors->any())
        <div class={{$erro}}>
            {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}
        </div>
    @endif
    </div>


    <button type="submit" class={{ $classe }}>ENVIAR</button>
</form>

{{-- @if ($errors->any())
    <div style="position: absolute; top:0px; left: 0px; width: 100%; background:red">
        @foreach ($errors->all() as $error)
            {{ $error }} <br>
        @endforeach
    </div>
@endif --}}
