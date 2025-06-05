@extends('site.layouts.basico')

@section('titulo', $titulo)
@section('conteudo')

<div class="flex flex-col min-h-screen font-['Roboto',sans-serif] text-[#333]">
    <div class="py-10 bg-[#2a9ee2] text-center">
        <h1 class="m-0 text-white text-[28px]">Login</h1>
    </div>

    <div class="text-center mt-10">
        <div class="w-[30%] mx-auto">
            <form action="{{ route('site.login') }}" method="post" class="space-y-6">
                @csrf

                <div class="relative">
                    <input
                        name="usuario"
                        type="text"
                        placeholder="Usuário"
                        value="{{ old('usuario') }}"
                        class="w-full p-[10px_15px] box-border rounded-[5px] bg-inherit text-[#333] border {{ $errors->has('usuario') ? 'border-red-500' : 'border-[#333]' }}"
                    >
                    @if ($errors->has('usuario'))
                        <div class="absolute top-[36px] right-[10px] bg-white p-1 text-xs text-red-600">
                            {{ $errors->first('usuario') }}
                        </div>
                    @endif
                </div>

                <div class="relative">
                    <input
                        name="senha"
                        type="password"
                        placeholder="Senha"
                        class="w-full p-[10px_15px] box-border rounded-[5px] bg-inherit text-[#333] border {{ $errors->has('senha') ? 'border-red-500' : 'border-[#333]' }}"
                    >
                    @if ($errors->has('senha'))
                        <div class="absolute top-[36px] right-[10px] bg-white p-1 text-xs text-red-600">
                            {{ $errors->first('senha') }}
                        </div>
                    @endif
                </div>

                <button
                    type="submit"
                    class="w-full p-[10px_15px] rounded-[3px] bg-[#7ab829] text-white hover:bg-[#6ea22c]"
                >
                    Acessar
                </button>
            </form>

            @if(isset($erro) && $erro != '')
                <div class="mt-4 text-red-600 font-semibold">
                    {{ $erro }}
                </div>
            @endif

            <div class="mt-6">
                <a href="#" class="text-[#268fd0] hover:underline">Novo por aqui?</a>
            </div>
        </div>
    </div>

    <div class="rodape mt-auto bg-[#f8f8f8] border-t border-gray-300 flex w-full h-[250px]">
        <div class="w-1/3 text-center p-6">
            <h2 class="font-semibold mb-4">Redes sociais</h2>
            <div class="flex justify-center space-x-6">
                <img src="{{ asset('img/facebook.png') }}" alt="Facebook">
                <img src="{{ asset('img/linkedin.png') }}" alt="Linkedin">
                <img src="{{ asset('img/youtube.png') }}" alt="YouTube">
            </div>
        </div>
        <div class="w-1/3 text-center p-6">
            <h2 class="font-semibold mb-4">Contato</h2>
            <span>(11) 3333-4444</span><br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="w-1/3 text-center p-6">
            <h2 class="font-semibold mb-4">Localização</h2>
            <img src="{{ asset('img/mapa.png') }}" alt="Mapa" class="mx-auto">
        </div>
    </div>
</div>

@endsection
