<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $items = [
            'Camiseta', 'Calça Jeans', 'Vestido', 'Jaqueta', 'Blusa',
            'Shorts', 'Saia', 'Moletom', 'Boné', 'Cinto', 'Bolsa', 'Óculos de Sol',
        ];

        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'name' => fake()->randomElement($items).' '.fake()->colorName(),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 30, 500),
            'quantity' => fake()->numberBetween(1, 20),
            'photo' => fake()->imageUrl(640, 480, 'fashion'),
        ];
    }
}