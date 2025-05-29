@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="flex flex-col min-h-screen font-['Roboto',sans-serif] text-[#333]">
        <div class="py-10 bg-[#2a9ee2] text-center">
            <h1 class="m-0 text-white text-[28px]">Editar cliente</h1>
        </div>

        <div class="flex justify-center mt-6">
            <ul class="flex gap-4">
                <li><a href="{{ route('app.cliente.index') }}" class="text-[#333] hover:text-[#268fd0]">Voltar</a></li>
            </ul>
        </div>

        <div class="text-center mt-10">
            <div class="w-[30%] mx-auto">
                @component('app.cliente._components.form_create_edit', ['cliente' => $cliente])
                @endcomponent

                @if ($msg ?? '')
                    <div class="text-sm text-[#2a9ee2] mt-4">
                        {{ $msg }}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
