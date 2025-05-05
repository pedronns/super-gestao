<h3>Fornecedor</h3>

{{-- Comentário blade --}}

@php

    // comentário php
@endphp

{{-- @if (count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existem vários fornecedores cadastrados</h3>
@else
    <h3>Não existem fornecedores cadastrados</h3>
@endif --}}





<br>

@isset($fornecedores)

<hr>
    @foreach ($fornecedores as $indice => $fornecedor)
        Iteração: {{ $loop->iteration}}
        <br>

        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? 'XX. XXX. XXX/0001-XX' }}
        <br>
        Telefone: ({{ $fornecedor['ddd'] ?? 'xx' }}) {{ $fornecedor['telefone'] ?? '' }}

        <hr>
    @endforeach
@endisset

{{-- @switch($fornecedores[0]['ddd'])
        @case('11')
            São Paulo - SP
            @break
        @case('32')
            Juiz de Fora - MG
            @break
        @case('85')
            Fortaleza - CE
            @break
        @default
            DDD não identificado
    @endswitch --}}
<br>


@php
    /*
    if(empty(@variavel))
    - ''
    - 0
    - 0.0
    - '0'
    - null
    - false
    - []
    - $var 
    */
@endphp

{{-- @isset($fornecedores)
    Fornecedor: {{$fornecedores[0]['nome']}}
    <br>
    Status: {{$fornecedores[0]['status']}}
    <br>
    @isset($fornecedores[0]['cnpj'])
        CNPJ: {{ $fornecedores[0]['cnpj']}}
        @empty($fornecedores[0]['cnpj'])
            - Vazio
        @endempty
    @endisset
@endisset --}}

{{-- @php

echo empty($fornecedores[1]['cnpj']) ? 'CNPJ não informado' : 'CNPJ informado'; 

@endphp --}}
