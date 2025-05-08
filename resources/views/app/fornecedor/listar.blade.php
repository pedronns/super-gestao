@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>    
                Fornecedor - Lista
            </h1>
        </div>

        <div class="menu">
            <ul>
                <li>
                    <a href="{{{route('app.fornecedor.adicionar')}}}">Novo</a>
                    <a href="{{{route('app.fornecedor')}}}">Consulta</a>
                </li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 30%; margin-left:auto; margin-right:auto">
                {{-- lista --}}
            </div>
        </div>
    </div>

@endsection
