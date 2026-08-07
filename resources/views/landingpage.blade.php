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
            <input type="text" placeholder="Buscar produtos">
        </div>
        <div class="conteudo-hero">
            <div class="texto-hero">
                <h1>Lorem ipsum dolor sit amet <br>consectetur adipisicing elit.</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur <br>laudantium sit iure dignissimos ratione voluptas veniam maxime debitis tempore!</p>
            </div>
            <div class="img-hero">
                <img src="{{ asset('media/imagem-hero.png') }}" alt="img-hero">
            </div>
        </div>
    </div>
      <div class="produtos">
            <h2>PRODUTOS</h2>
            <div class="container-produtos">
                <div class="grid-produto">
                <img src="{{ asset('media/produto1.jpg') }}" alt="produto 1">
                <div class="ctd-produto">
                <p>Nome do Produto</p>
                <p>$89</p>
                </div>
                <button>Ver produto</button>
            </div>
            </div>
        </div>
        <div class="promocao">
            <h3>PROMO! PROMO! PROMO!</h3>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat eos harum officiis, dolores expedita saepe, velit architecto eveniet animi dolor laborum non debitis accusamus voluptatibus, autem repellendus nesciunt excepturi obcaecati?</p>
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