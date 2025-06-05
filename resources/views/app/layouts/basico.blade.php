<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Super Gestão - @yield('titulo')</title>
    <meta charset="utf-8">

    {{-- Legado --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}"> --}}

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body>
    @include('app.layouts._partials.topo')
    @yield('conteudo')
</body>

</html>
