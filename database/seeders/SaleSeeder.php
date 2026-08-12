<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Sale;
use App\Models\User;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $buyer = User::first();
        $products = Product::all();

        foreach ($products->take(5) as $product) {
            $quantity = rand(1, 3);
            $unitPrice = $product->price;

            Sale::create([
                'product_id' => $product->id,
                'buyer_id' => $buyer->id,
                'seller_id' => $product->user_id,
                'quantity' => $quantity,
                'unit_price' => $unitPrice,
                'total_price' => $quantity * $unitPrice,
            ]);
        }
    }
}
