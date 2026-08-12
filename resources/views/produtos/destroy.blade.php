<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar</title>
</head>
<body>
    <div class="delete-containerprod">
        <h3>Deletar Usuário</h3>
        <div class="imgdeleteprod">
            <img src="" alt="produto">
            <p>Tem certeza que deseja deletar o produto <strong>{{$product->name}}</strong>? Esta ação não poderá ser desfeita </p>
        </div>
        <div class="botoesdlete">
            <a href="{{ route('produtos.index') }}"><button>Cancelar</button></a>
            <form method="POST" action="{{ route('produtos.destroy', $product->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Deletar</button>
            </form>
        </div>
    </div>
</body>
</html>