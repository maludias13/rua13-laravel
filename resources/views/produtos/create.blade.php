<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Produto</title>
</head>
<body>
    <form method="POST" action="{{ route('produtos.store') }}" enctype="multipart/form-data">
        @csrf
        <label>Nome do Produto</label>
        <input type="text" name="name" value="{{old ('name')}}" placeholder="Digite o nome do produto">
        @error('name')
        <span class="error">{{$message}}</span>
        @enderror
        <label>Categoria</label>
            <select name="category_id">
                <option value="">Selecione</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
              @error('category_id')
                <span class="erro">{{ $message }}</span>
            @enderror
    </form>
</body>
</html>