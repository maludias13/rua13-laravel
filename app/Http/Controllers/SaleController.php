<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class SaleController extends Controller
{
    public function index()
    {
        if (is_current_user_admin()) {
            $sales = Sale::latest()->get();
        } else {
            $sales = Sale::where('seller_id', auth()->id())->latest()->get();
        }

        return view('vendas.index', ['sales' => $sales]);
    }
}
