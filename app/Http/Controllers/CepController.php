<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CepController extends Controller
{
    public function show(string $cep)
    {
        $cep = preg_replace('/\D/', '', $cep);

        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");

        return response()->json($response->json());
    }
}