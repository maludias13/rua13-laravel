<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Produto</title>
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
                <div class="lista-tam">
                    @foreach($product->sizes as $size)
                    <button type="button">{{$size->name}}</button>
                    @endforeach
                </div>
                <div class="quantidade">
                    <button>-</button>
                    <p>1</p>
                    <button>+</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>