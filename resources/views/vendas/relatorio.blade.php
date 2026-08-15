<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }
        h1 {
            font-size: 20px;
            margin-bottom: 4px;
        }
        p.subtitulo {
            color: #666;
            margin-top: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <h1>RUA13 - Relatório de Vendas</h1>
    <p class="subtitulo">Gerado em {{ now()->format('d/m/Y H:i') }}</p>

    <table>
        <thead>
            <tr>
                <th>Data</th>
                <th>Valor</th>
                <th>Categoria</th>
                <th>Comprador</th>
                <th>Vendedor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $sale->created_at->format('d/m/Y') }}</td>
                    <td>{{ format_price($sale->total_price) }}</td>
                    <td>{{ $sale->product->category->name ?? '-' }}</td>
                    <td>{{ $sale->buyer->name ?? '-' }}</td>
                    <td>{{ $sale->seller->name ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>