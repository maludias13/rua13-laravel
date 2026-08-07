<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $masculino = Category::where('name', 'Masculino')->first()->id;
        $acessorios = Category::where('name', 'Acessórios')->first()->id;
        $userId = User::first()->id;

        $products = [
            ['name' => 'Casaco rchangel', 'price' => 140, 'category_id' => $masculino, 'photo' => 'casaco-rchangel.jpg'],
            ['name' => 'Conjunto de colares', 'price' => 30, 'category_id' => $acessorios, 'photo' => 'conjunto-de-colares.jpg'],
            ['name' => 'Camisa Oversized', 'price' => 89, 'category_id' => $masculino, 'photo' => 'camisa-oversized.jpg'],
            ['name' => 'Óculos Punk', 'price' => 65, 'category_id' => $acessorios, 'photo' => 'oculos-punk.jpg'],
            ['name' => 'Gorro Casual', 'price' => 57, 'category_id' => $acessorios, 'photo' => 'gorro-casual.jpg'],
            ['name' => 'Camisa Oversized', 'price' => 75, 'category_id' => $masculino, 'photo' => 'camisa-oversized-2.jpg'],
            ['name' => 'Boné Casual', 'price' => 42, 'category_id' => $acessorios, 'photo' => 'bone-casual.jpg'],
            ['name' => 'Calça de moleton', 'price' => 186, 'category_id' => $masculino, 'photo' => 'calca-de-moletom.jpg'],
        ];

        foreach ($products as $product) {
            Product::create([
                'user_id' => $userId,
                'category_id' => $product['category_id'],
                'name' => $product['name'],
                'description' => 'Peça streetwear Rua 13.',
                'price' => $product['price'],
                'quantity' => 10,
                'photo' => $product['photo'],
            ]);
        }
    }
}
