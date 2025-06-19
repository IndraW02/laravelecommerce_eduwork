<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Laptop ASUS ROG',
                'description' => 'Laptop gaming dengan performa tinggi',
                'price' => 22000000,
                'stock' => 10,
                'image' => 'laptop_asus_rog.jpg',
                'category_id' => 1, // Elektronik
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kaos Polos Hitam',
                'description' => 'Kaos nyaman untuk harian',
                'price' => 50000,
                'stock' => 50,
                'image' => 'kaos_polos_hitam.jpg',
                'category_id' => 2, // Pakaian
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Kopi Susu Gula Aren',
                'description' => 'Minuman kekinian botol 250ml',
                'price' => 18000,
                'stock' => 100,
                'image' => 'kopi_susu_gula_aren.jpg',
                'category_id' => 3, // Makanan & Minuman
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
