<div class="w-full bg-[#f8f8f8] h-20 flex items-center justify-between px-10">

    <div>
        <img src="{{ asset('img/logo.png') }}" class="w-8" alt="Logo">
    </div>

    <nav>
        <ul class="flex items-center space-x-5">
            <li><a href="{{ route('app.home') }}" class="text-[#333] hover:text-[#268fd0] px-3 py-2">Home</a></li>
            <li><a href="{{ route('app.cliente.index') }}" class="text-[#333] hover:text-[#268fd0] px-3 py-2">Cliente</a></li>
            <li><a href="{{ route('app.pedido.index') }}" class="text-[#333] hover:text-[#268fd0] px-3 py-2">Pedido</a></li>
            <li><a href="{{ route('app.fornecedor') }}" class="text-[#333] hover:text-[#268fd0] px-3 py-2">Fornecedor</a></li>
            <li><a href="{{ route('app.produto.index') }}" class="text-[#333] hover:text-[#268fd0] px-3 py-2">Produto</a></li>
            <li><a href="{{ route('app.sair') }}" class="text-[#333] hover:text-[#268fd0] px-3 py-2">Sair</a></li>
        </ul>
    </nav>

</div>
