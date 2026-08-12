<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Produtos</title>
</head>
<body>
    <div class="sidebar">
        <div class="geren-prod-container">
            <h2><img src="" alt="">Gerenciamento de Produtos</h2>
            <div class="busca-prod">
                <input type="text" placeholder="Buscar por nome, categoria ou autor">
                <button type="button"><img src="{{asset('media/filtro-de-busca.svg') }}" alt="filtro ">Filtro</button>
                <button type="button"> + Criar Produto</button>
            </div>
            <table class="tabela-produtos">
                <thead>
                    <th>ID</th>
                    <th>PRODUTO</th>
                    <th>CATEGORIA</th>
                    <th>AUTOR</th>
                    <th>AÇÕES</th>
                </thead>
                
                <tbody>
                    <tr><img src="{{ asset('storage/products' . $product->'photo'" alt="{{$product->name}}">{{$product->name}}</tr>
                    <tr>{{$product->category_id}}</tr>
                    <tr>{{$product->user->name}}</tr>
                    <tr>
                        <button><img src="" alt="vizualizar"></button>
                        <button><img src="" alt="editar"></button>
                        <button><img src="" alt="deletar"></button>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>