<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    public function run(): void
    {
        $sizes = ['PP', 'P', 'M', 'G', 'GG'];

        foreach ($sizes as $size) {
            Size::create(['name' => $size]);
        }
    }
}