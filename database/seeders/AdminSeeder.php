<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'name' => 'Administrador Padrão',
            'email' => 'admin@rua13.com',
            'password' => Hash::make('password'),
            'cpf' => '00000000000',
            'phone' => '(32) 90000-0000',
            'birth_date' => '1990-01-01',
            'cep' => '36035-680',
            'number' => '100',
            'street' => 'Rua Principal',
            'neighborhood' => 'Centro',
            'city' => 'Juiz de Fora',
            'state' => 'MG',
        ]);
    }
}