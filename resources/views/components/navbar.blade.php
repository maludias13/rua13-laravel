@props(['variant' => 'preta'])
<header class="navbar navbar-{{ $variant }}">
    <nav class="navbar-nav">
        <a href="#">Lançamentos</a>
        <a href="#">Masculino</a>
        <a href="#">Feminino</a>
        <a href="#">Acessórios</a>
    </nav>
    <a href="{{ route('landingpage')}}" class="navlogo">
        <img src="{{ asset( $variant === 'preta' ? 'media/logo-rua13branca.png' : 'media/logo-rua13preta.png')}}" alt="logo-branca">
    </a>
    <div class="icons-navb">
        <img src="{{ asset( $variant === 'preta' ? 'media/Heartbraca.svg' : 'media/Heartblack.svg') }}" alt="coracao">
        <a href="{{ route('profile.perfil') }}">
            <img src="{{ asset($variant === 'preta' ? 'media/peoplebranca.svg' : 'media/peopleblack.svg') }}" alt="pessoa">
        </a>        
        <img src="{{ asset($variant === 'preta' ? 'media/CartCheckbranca.svg' : 'media/CartCheckblack.svg') }}" alt="carrinho">
    </div>
</header>