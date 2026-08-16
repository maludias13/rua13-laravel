<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Produtos</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="sidebar">
        <div class="geren-prod-container">
            <div class="topo-g">
                <div class="text-g">
                        <h1><img src="" alt="">Gerenciamento de Produtos</h1>
                        <p>Crie, edite ou exclua um produto da sua loja</p> 
                </div>
                <div class="admin">
                    <img src="{{ asset('media/peoplebranca.svg')}}" alt="pessoa">
                    <p>Administrador</p>
                </div>
            </div>
            <div class="busca-prod">
                <input type="text" placeholder="Buscar por nome, categoria ou autor">
                <button type="button"><img src="{{asset('media/filtro-de-busca.svg') }}" alt="filtro ">Filtro</button>
                <a href="{{ route('produtos.create')}}"><button type="button"> + Criar Produto</button></a>

            </div>
            
                <div class="tabela-v">
                    <table class="tabela-vendas">
                        <thead>
                            <th>ID</th>
                            <th>PRODUTO</th>
                            <th>CATEGORIA</th>
                            <th>AUTOR</th>
                            <th>AÇÕES</th>
                        </thead>
                        <tbody >
                            @foreach ($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>
                                <img src="{{ asset('storage/products/' . $product->photo) }}" alt="{{ $product->name }}" width="40">
                                {{ $product->name }}
                                </td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->user->name}}</td>
                                <td>
                                <a href=""><button><img src="" alt="vizualizar"></button></a>
                                <a href="{{route('produtos.edit', $product->id)}}"><button><img src="" alt="editar"></button></a>
                                <a href="{{route('produtos.confirm-delete', $product->id)}}"><button><img src="" alt="delete"></button></a>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</body>
</html>