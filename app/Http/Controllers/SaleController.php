<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class SaleController extends Controller
{
        public function index(Request $request)
    {
        $search = $request->query('search');
        $dataInicial = $request->query('data_inicial');
        $dataFinal = $request->query('data_final');

        $query = is_current_user_admin()
            ? Sale::query()
            : Sale::where('seller_id', auth()->id());

        $sales = $query
            ->when($search, function ($q) use ($search) {
                $q->whereHas('product', function ($productQuery) use ($search) {
                    $productQuery->where('name', 'like', "%{$search}%");
                });
            })
            ->when($dataInicial, fn ($q) => $q->whereDate('created_at', '>=', $dataInicial))
            ->when($dataFinal, fn ($q) => $q->whereDate('created_at', '<=', $dataFinal))
            ->latest()
            ->get();

        return view('vendas.index', ['sales' => $sales]);
    }
}
