@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>
                Fornecedor - Adicionar
            </h1>
        </div>

        <div class="menu">
            <ul>
                <li>
                    <a href="{{ route('app.fornecedor.adicionar') }}">Novo</a>
                    <a href="{{ route('app.fornecedor') }}">Consulta</a>
                </li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left:auto; margin-right:auto">
                <form method="post" action="{{ route('app.fornecedor.adicionar') }}">
                    <input type="hidden" name="id" value="{{ $fornecedor->id ?? '' }}">
                    @csrf
                    <div class="input-container">
                        <input type="text" name="nome" value="{{ $fornecedor->nome ?? old('nome') }}"
                            placeholder="Nome" class={{ $errors->any('usuario') ? 'borda-vermelha' : 'borda-preta' }}>
                        @if ($errors->any('nome'))
                            <div class="msg-erro-branco">{{ $errors->has('nome') ? $errors->first('nome') : '' }}</div>
                        @endif
                    </div>

                    <div class="input-container">
                        <input type="text" name="site" value="{{ $fornecedor->site ?? old('site') }}"
                            placeholder="Site" class={{ $errors->any('usuario') ? 'borda-vermelha' : 'borda-preta' }}>
                        @if ($errors->any('site'))
                            <div class="msg-erro-branco">{{ $errors->has('site') ? $errors->first('site') : '' }}</div>
                        @endif
                    </div>

                    <div class="input-container">
                        <select name="uf" class="{{ $errors->has('uf') ? 'borda-vermelha' : 'borda-preta' }}">
                            <option value="" disabled
                                {{ (old('uf') ?? ($fornecedor->uf ?? '')) == '' ? 'selected' : '' }}>Estado</option>
                            @foreach (['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'] as $estado)
                                <option value="{{ $estado }}"
                                    {{ (old('uf') ?? ($fornecedor->uf ?? '')) == $estado ? 'selected' : '' }}>
                                    {{ $estado }}
                                </option>
                            @endforeach
                        </select>

                        @if ($errors->any('uf'))
                            <div class="msg-erro-branco">{{ $errors->has('uf') ? $errors->first('uf') : '' }}</div>
                        @endif
                    </div>

                    <div class="input-container">
                        <input type="text" name="email" value="{{ $fornecedor->email ?? old('email') }}"
                            placeholder="E-mail" class={{ $errors->has('email') ? 'borda-vermelha' : 'borda-preta' }}>
                        <div class="msg-erro-branco">{{ $errors->has('email') ? $errors->first('email') : '' }}</div>
                    </div>

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
