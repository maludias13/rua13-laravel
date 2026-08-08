<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rua 13</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="hero-banner">
       <div class="busca">
         <form method="GET" action="{{ route('landingpage') }}">
            <input type="text" name="search" value="{{ request('search')}}" class="filtro-busca"placeholder="Buscar produtos">
        </form>
          <div x-data="{ open: false }" class="relative">
        <button type="button" @click="open = !open" aria-label="Filtrar por categoria">
            <img src="{{ asset('media/filtro-de-busca.svg') }}" alt="filtro-de-busca" class="btn-busca">
        </button>

        <div x-show="open" @click.outside="open = false" class="filtro-menu">
            <a href="{{ route('landingpage') }}">Todas as categorias</a>
            @foreach ($categories as $category)
                <a href="{{ route('landingpage', ['categoria' => $category->id, 'search' => request('search')]) }}">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
        </div>
       </div>
        <div class="conteudo-hero">
            <div class="texto-hero">
                <h1>ESSENCIAL PARA QUEM VIVE <br>  A RUA</h1>
                <p>Estilo, atitude e autenticidade 
                para <br> acompanhar o seu corre.</p>
            </div>
            <div class="img-hero">
                <img src="{{ asset('media/imagem-hero.png') }}" alt="img-hero">
            </div>
        </div>
    </div>
      <div class="produtos">
            <div class="ver-produtos"><h2>PRODUTOS</h2> <button><img src="{{ asset('media/seta.svg')}}" alt="seta">Ver produtos</button></div>
            <div class="container-produtos">
                @foreach ($products as $product)
                <div class="grid-produto">
                    <img src="{{ asset('media/' . $product->photo) }}" alt="{{$product->name}}">
                    <div class="ctd-produto">
                        <p>{{$product->name}}</p>
                        <p>{{format_price($product->price)}}</p>
                        </div>
                        <button>Ver produto</button>
            </div>
            @endforeach
            </div>
        </div>
        <div class="promocao">
            <div class="texto-promo">
                <h3>PROMO! PROMO! PROMO!</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat eos harum officiis, dolores expedita saepe, velit architecto eveniet animi dolor laborum non debitis accusamus voluptatibus, autem repellendus nesciunt excepturi obcaecati?</p>
            </div>
            <button>use o codigo "codelegal40" para obter desconto</button>
        </div>
        <div class="final-page">
            <div class="colecoes-destaque">
            <img src="{{ asset('media/colecao-verao.jpg')}}" alt="verao">
            <img src="{{ asset('media/colecaoinverno.jpg')}}" alt="inverno">
        </div>
        <div class="inscreva-se">
           <div class="texto-i">
             <h3>INSCREVA-SE PARA FICAR POR DENTRO DAS NOVIDADES</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur <br>laudantium sit iure dignissimos ratione voluptas veniam maxime debitis tempore!</p>
           </div>
           <div class="inputs-i">
            <input type="text" placeholder="NOME">
            <input type="text" placeholder="EMAIL">
            <button>INSCREVA-SE</button>
           </div>
        </div>
        </div>
</body>
</html>