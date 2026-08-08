<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class landingpageController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $categoryId = $request->query('categoria');

        $products = Product::query()
            ->when($search, fn ($query) => $query->where('name', 'like', "%{$search}%"))
            ->when($categoryId, fn ($query) => $query->where('category_id', $categoryId))
            ->latest()
            ->take(8)
            ->get();

        $categories = Category::all();

        return view('landingpage', [
        'products' => $products,
        'categories' => $categories,
]);
    }
}