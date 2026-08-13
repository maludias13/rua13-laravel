<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class SaleController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');

        $query = is_current_user_admin()
            ? Sale::query()
            : Sale::where('seller_id', auth()->id());

        $sales = $query
            ->when($search, function ($q) use ($search) {
                $q->whereHas('product', function ($productQuery) use ($search) {
                    $productQuery->where('name', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->get();

        return view('vendas.index', ['sales' => $sales]);
    }
}
