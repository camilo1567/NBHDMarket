<?php

namespace Database\Seeders;

use App\Models\Nbhdmarket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NbhdmarketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nbhdmarket::create([
            'correo' => 'nbhdmarket@gmail.com',
            'telefono' => '1234567890',
            'direccion' => 'Calle 123',
            'twitter' => 'nbhdmarket',
            'facebook' => 'nbhdmarket',
            'instagram' => 'nbhdmarket',
            'whatsapp' => '1234567890',
        ]);
    }
}
