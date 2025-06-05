@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')

    <div class="bg-[#2a9ee2] py-10 text-center">
        <h1 class="text-white text-3xl font-bold">Entre em contato conosco</h1>
    </div>

    <div class="max-w-5xl mx-auto px-6 py-10 text-gray-800">
        <div class="w-full mx-auto">
            @component('site.layouts._components.form_contato', [
                'classe' => 'border border-gray-700 rounded bg-white',
                'erro' => 'absolute text-red-500 text-[12px] bg-[#2a9ee2] p-1',
                'motivo_contatos' => $motivo_contatos,
            ])
                <p>A nossa equipe analisará a sua mensagem e retornaremos o mais breve possível.</p>
                <p>Nosso tempo médio de resposta é de 48 horas.</p>
            @endcomponent
        </div>
    </div>

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

@endsection
