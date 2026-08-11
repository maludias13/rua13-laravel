<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Size;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $masculino = Category::where('name', 'Masculino')->first()->id;
        $acessorios = Category::where('name', 'Acessórios')->first()->id;
        $userId = User::first()->id;
        $allSizes = Size::pluck('id');

        $products = [
            ['name' => 'Camisa Polo', 'price' => 100, 'category_id' => $masculino, 'photos' => ['camisapolof.png', 'camisapoloc.png', 'camisapologola.png']],
            ['name' => 'Conjunto de colares', 'price' => 30, 'category_id' => $acessorios, 'photo' => 'conjunto-de-colares.jpg'],
            ['name' => 'Camisa Oversized', 'price' => 89, 'category_id' => $masculino, 'photo' => 'camisa-oversized.jpg'],
            ['name' => 'Óculos Punk', 'price' => 65, 'category_id' => $acessorios, 'photo' => 'oculos-punk.jpg'],
            ['name' => 'Gorro Casual', 'price' => 57, 'category_id' => $acessorios, 'photo' => 'gorro-casual.jpg'],
            ['name' => 'Camisa Oversized', 'price' => 75, 'category_id' => $masculino, 'photo' => 'camisa-oversized-2.jpg'],
            ['name' => 'Boné Casual', 'price' => 42, 'category_id' => $acessorios, 'photo' => 'bone-casual.jpg'],
            ['name' => 'Calça de moleton', 'price' => 186, 'category_id' => $masculino, 'photo' => 'calca-de-moletom.jpg'],
        ];

        foreach ($products as $product) {
            $newProduct = Product::create([
                'user_id' => $userId,
                'category_id' => $product['category_id'],
                'name' => $product['name'],
                'description' => 'Peça streetwear Rua 13.',
                'price' => $product['price'],
                'quantity' => 10,
                'photo' => $product['photo'],
                'rating' => rand(35, 50) / 10,
                'reviews_count' => rand(10, 1000),
            ]);

            $newProduct->sizes()->attach($allSizes);

            foreach (range(1, 3) as $i) {
                $newProduct->photos()->create(['photo' => $product['photo']]);
            }
        }
    }
}