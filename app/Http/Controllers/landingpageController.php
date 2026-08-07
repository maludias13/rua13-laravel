<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class landingpageController extends Controller
{
       public function index()
    {
        $products = Product::paginate(8);

        return view('landingpage', ['products' => $products]);
    }
}
