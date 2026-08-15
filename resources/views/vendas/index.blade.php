<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Historico de Vendas</title>
</head>
<body>
    <div class="topo">
        <button><img src="{{ asset('media/list.svg')}}" alt="filtro"></button>
        <div class="admin">
            <img src="{{ asset('media/peoplebranca.svg')}}" alt="pessoa">
            <p>Administrador</p>
        </div>
    </div>
    <div class="vendas-container">
        <div class="titulo-vendas">
        <h3>Historico de Vendas</h3>
        <p>Consulte todas as vendas realizadas</p>
        </div>
    <div class="botoes-vendas">
        <div class="botoes-inputv">
        <form method="GET" action="{{ route('vendas.index') }}" class="botoes-inputv">
            <input type="date" name="data_inicial" value="{{ request('data_inicial') }}">
            <input type="date" name="data_final" value="{{ request('data_final') }}">
            <input type="text" name="search" placeholder="Busca por nome ou categoria" value="{{ request('search') }}">
            <button type="submit">Filtrar</button>
            <a href="{{ route('vendas.export', request()->query()) }}"><img src="{{ asset('media/Phone.svg') }}" alt="">Exportar</a>
        </form>
        </div>  
    </div>
    <div class="prodvendido">
        <div class="conteudo-venda">
        @forelse($sales as $sale)
        @if($sale->product)
        <img src="{{ asset('media/' . $sale->product->photo) }}" alt="{{ $sale->product->name }}" width="40">
        @endif
        
        <div class="dados-venda">
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
        </div>
        @empty
            <p>Nenhuma venda encontrada.</p>
        @endforelse
    </div>
    </div>
</body>
</html>