@props(['variant' => 'preta'])
<header class="navbar navbar-{{ $variant }}">
    <nav class="navbar-nav">
        <a href="#">Lançamentos</a>
        <a href="#">Masculino</a>
        <a href="#">Feminino</a>
        <a href="#">Acessórios</a>
    </nav>
    <a href="{{ route('landingpage')}}">
        <img src="{{ asset('media/logo-rua13branca.png')}}" alt="logo-branca">
    </a>
    <div class="icons-navb">
        <img src="{{ asset('media/Heartblack.svg') }}" alt="coracao">
        <img src="{{ asset('media/peoleblack.svg') }}" alt="pessoa">
        <img src="{{ asset('media/CartCheckblack.svg') }}" alt="carrinho">
    </div>
</header>