<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$product->name}}-Rua13</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-navbar variant="preta"/>
    <div class="pagprodutos-container">
        <div class="prodfotos">
            <div class="foto1">
                <img src="{{ asset('media/' . $product->photos->first()->photo) }}" alt="{{ $product->name }}">
            </div>
            <div class="fotolados">
                @foreach ($product->photos->skip(1) as $photo)
                    <img src="{{ asset('media/' . $photo->photo) }}" alt="{{ $product->name }}">
                @endforeach
            </div>
        </div>
        <div class="conteudo-pagproduto">
            <div class="peca-preco">
                <h3>{{$product->name}}</h3>
                <h3>{{format_price($product->price)}}</h3>
            </div>
            <div class="avaliacao-pagproduto">
                @for($i=1; $i<=5; $i++)
                    <span>{{$i <= round($product->rating) ?  '★' : '☆' }}</span>                 
                @endfor
                <span>{{ $product->reviews_count }} reviews</span>
            </div>
            <div class="tamanho-pagproduto">
                <h3>Tamanho</h3>
                    <div class="lista-tam">
                    @foreach($product->sizes as $size)
                    <button type="button">{{$size->name}}</button>
                    @endforeach
                    </div>

            </div>
                <div class="quantidade">
                    <h3>Quantidade</h3>
                    <div class="botoesqtd">
                    <button>-</button>
                    <p>1</p>
                    <button>+</button>
                    </div>
                </div>
                <div class="comprar-prod">
                    <button class="adquirir" type="button">ADQUIRIR</button>
                    <button  type="button" class="fav"><img src="{{ asset('media/Heart.svg')}}" alt="favoritos"></button>
                </div>
                <div class="descricaoprod">
                    <h3>Descrição</h3>
                    <p>{{$product->description}}</p>
                </div>
                <div class="contatovend">
                    <div class="contato">
                    <h3>Contato</h3>
                    <p>{{$product->user->name}}</p>
                    </div>
                    <div class="telefone">
                    <h3>Telefone</h3>
                    <p>{{format_phone($product->user->phone)}}</p>
                    </div>
                </div>
                <div class="entregas-devol">
                    <div class="entregas">
                        <h3>Entregas Rapidas</h3>
                        <p>Enviamos seu pedido com <br> rapidez e segurança.</p>
                    </div>
                    <div class="dev">
                        <h3>Devoluções Grátis</h3>
                        <p>Solicite sua devolução de <br> forma simples e segura.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>