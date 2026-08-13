<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historico de Vendas</title>
</head>
<body>
    <h3>Suas vendas</h3>
    <div class="botoes-vendas">
        <a href="#">ENTREGUES</a>
        <a href="#">EM ANDAMENTO</a>
        <a href="#">DEVOLUÇÃO</a>
        <input type="text" placeholder="Busca por nome ou categoria">
    </div>
    <div class="prodvendido">
        @forelse($sales as $sale)
        @if($sale->product)
        <img src="{{ asset('media/' . $sale->product->photo) }}" alt="{{ $sale->product->name }}" width="40">
        @endif
        <div class="conteudo-venda">
            <div class="np-venda">
                <h3>{{$sale->product->name}}</h3>
                <h3>{{format_price($sale->total_price)}}</h3>
            </div>
            <div class="tamdata-venda">
                <h3>TAMANHO {{ $sale->size->name ?? '-' }}</h3>
                <p>Vendido em {{ $sale->created_at->format('d/m/Y') }}</p>
            </div>
            @if ($sale->product)
                <a href="{{ route('produto.show', $sale->product->id) }}">Ver Produto</a>
            @endif
             </div>
            @empty
            <p>Nenhuma venda encontrada.</p>
        @endforelse
    </div>
</body>
</html>