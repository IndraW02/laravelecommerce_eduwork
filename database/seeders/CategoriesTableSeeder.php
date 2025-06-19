<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Elektronik',
                'description' => 'Produk-produk elektronik seperti HP, laptop, dll',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Pakaian',
                'description' => 'Baju, celana, dan aksesoris fashion lainnya',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Makanan & Minuman',
                'description' => 'Snack, minuman ringan, dan kebutuhan sehari-hari',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
