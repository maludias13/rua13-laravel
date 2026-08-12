<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="editar-produto">
        <form method="POST" action="{{ route('produtos.update', $product) }}" enctype="multipart/form-data">
            <label>Nome</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}">
            @error('name')
                <span class="erro">{{ $message }}</span>
            @enderror
        </form>
    </div>
</body>
</html>