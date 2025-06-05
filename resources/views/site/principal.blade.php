@extends('site.layouts.basico')

@section('titulo', $titulo)
@section('conteudo')

    <div class="w-full h-screen min-h-[800px] flex">

        {{-- Lado Esquerdo --}}
        <div class="w-3/5 h-full bg-[#268fd0]">
            <div class="m-10">
                <h1 class="text-[28px] text-white font-bold">Sistema Super Gestão</h1>
                <p class="mt-4 text-gray-800">Software para gestão empresarial ideal para sua empresa.</p>

                <div class="mt-8 ml-5 flex gap-6">
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('img/check.png') }}" alt="check" />
                        <span class="text-white">Gestão completa e descomplicada</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('img/check.png') }}" alt="check" />
                        <span class="text-white">Sua empresa na nuvem</span>
                    </div>
                </div>
            </div>

            <div class="m-10">
                <img src="{{ asset('img/player_video.jpg') }}" alt="Vídeo" class="max-w-full max-h-full">
            </div>
        </div>

        {{-- Lado Direito --}}
        <div class="w-2/5 h-full bg-[#2a9ee2]">
            <div class="m-10">
                <h1 class="text-[28px] text-white font-bold">Contato</h1>
                <p class="mt-4 mb-4 text-gray-800">Caso tenha qualquer dúvida, por favor entre em contato com nossa equipe
                    pelo formulário abaixo.</p>

                @component('site.layouts._components.form_contato', [
                    'classe' => 'border border-white rounded',
                    'erro' => 'absolute text-red-500 text-[12px] bg-[#2a9ee2] p-1',
                    'motivo_contatos' => $motivo_contatos,
                ])
                @endcomponent
            </div>
        </div>

    </div>
@endsection
