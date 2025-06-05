@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')

    <div class="flex flex-col min-h-screen">

        <!-- Conteúdo principal -->
        <div class="flex-grow text-center">
            <div class="bg-[#2a9ee2] py-10">
                <h1 class="text-white text-3xl font-bold">Olá, eu sou o Super Gestão</h1>
            </div>

            <div class="max-w-3xl mx-auto mt-8 px-4 text-gray-800 space-y-4">
                <p>O Super Gestão é o sistema online de controle administrativo que pode transformar e potencializar os negócios da sua empresa.</p>
                <p>Desenvolvido com a mais alta tecnologia para você cuidar do que é mais importante, seus negócios!</p>
            </div>
        </div>

        <!-- Rodapé -->
        <footer class="flex bg-gray-100 border-t border-gray-300 h-[250px] text-center text-gray-800">

            <div class="w-1/3 flex flex-col justify-center items-center space-y-4">
                <h2 class="text-xl font-semibold">Redes sociais</h2>
                <div class="flex space-x-6">
                    <img src="{{ asset('img/facebook.png') }}" alt="Facebook" class="h-8 w-auto" />
                    <img src="{{ asset('img/linkedin.png') }}" alt="LinkedIn" class="h-8 w-auto" />
                    <img src="{{ asset('img/youtube.png') }}" alt="YouTube" class="h-8 w-auto" />
                </div>
            </div>

            <div class="w-1/3 flex flex-col justify-center items-center space-y-2">
                <h2 class="text-xl font-semibold">Contato</h2>
                <span>(11) 3333-4444</span>
                <span>supergestao@dominio.com.br</span>
            </div>

            <div class="w-1/3 flex flex-col justify-center items-center space-y-4">
                <h2 class="text-xl font-semibold">Localização</h2>
                <img src="{{ asset('img/mapa.png') }}" alt="Mapa" class="max-w-full h-auto" />
            </div>

        </footer>
    </div>

@endsection
