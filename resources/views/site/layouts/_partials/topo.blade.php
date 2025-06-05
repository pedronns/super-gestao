<div class="w-full bg-[#f8f8f8] h-20 flex items-center justify-between px-10">
    
    <div>
        <img src="{{ asset('img/logo.png') }}" class="w-8" alt="Logo">
    </div>

    <nav>
        <ul class="flex items-center space-x-5">
            <li><a href="{{ route('site.index') }}" class="text-[#333] hover:text-[#268fd0] px-3 py-2">Principal</a></li>
            <li><a href="{{ route('site.sobrenos') }}" class="text-[#333] hover:text-[#268fd0] px-3 py-2">Sobre Nós</a></li>
            <li><a href="{{ route('site.contato') }}" class="text-[#333] hover:text-[#268fd0] px-3 py-2">Contato</a></li>
            <li><a href="{{ route('site.login') }}" class="text-[#333] hover:text-[#268fd0] px-3 py-2">Login</a></li>
        </ul>
    </nav>

</div>
