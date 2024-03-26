<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) { // Ubah 10 sesuai dengan jumlah produk yang ingin Anda buat
            Product::create([ 
            'image'=> '',
            'title' => 'Product ' . ($i + 1),
            'price' => rand(10, 100) * 1000,
            'stock' => rand(0, 100),
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            ]);
        }
    }
}
