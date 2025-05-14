@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>
                Adicionar produto
            </h1>
        </div>

        <div class="menu">
            <ul>
                <li>
                    <a href="{{route('app.produto.index')}}">Voltar</a>
                    <a href="">Consulta</a>
                </li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left:auto; margin-right:auto">
                <form method="post" action="">
                    @csrf
                    <div class="input-container">
                        <input type="text" name="nome" value="" placeholder="Nome"
                            class={{ $errors->any('nome') ? 'borda-vermelha' : 'borda-preta' }}>
                        {{-- @if ($errors->any('nome'))
                            <div class="msg-erro-branco">{{ $errors->has('nome') ? $errors->first('nome') : '' }}</div>
                        @endif --}}
                    </div>

                    <div class="input-container">
                        <input type="text" name="descricao" value="" placeholder="Site"
                            class={{ $errors->any('descricao') ? 'borda-vermelha' : 'borda-preta' }}>
                        {{-- @if ($errors->any('site'))
                            <div class="msg-erro-branco">{{ $errors->has('site') ? $errors->first('site') : '' }}</div>
                        @endif --}}
                    </div>

                    <div class="input-container">
                        <input type="text" name="peso" value="" placeholder="Peso"
                            class={{ $errors->any('descricao') ? 'borda-vermelha' : 'borda-preta' }}>

                        {{-- @if ($errors->any('uf'))
                            <div class="msg-erro-branco">{{ $errors->has('uf') ? $errors->first('uf') : '' }}</div>
                        @endif --}}
                    </div>

                    <div class="input-container">
                        <select name="unidade_id"
                            class="{{ $errors->has('unidade_id') ? 'borda-vermelha' : 'borda-preta' }}">
                            <option value="" disabled
                                {{ (old('unidade_id') ?? ($produto->unidade_id ?? '')) == '' ? 'selected' : '' }}>Unidade de medida</option>
                            @foreach ($unidades as $unidade)
                                <option value="{{ $unidade->id }}"
                                    {{ (old('unidade_id') ?? ($produto->unidade_id ?? '')) == $unidade->id ? 'selected' : '' }}>
                                    {{ $unidade->descricao }}
                                </option>
                            @endforeach
                        </select>

                        <button type="submit" class="borda-preta">Cadastrar</button>
                </form>

                @if ($msg ?? '')
                    <div class="msg-sucesso">
                        {{ $msg }}
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
