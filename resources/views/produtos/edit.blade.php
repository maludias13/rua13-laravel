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

            <label>Categoria</label>
            <select name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <span class="erro">{{ $message }}</span>
            @enderror
        </form>
    </div>
</body>
</html>