<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $desiredUserId = 2; // ID user yang sudah kamu cek ada di database
        $products = DB::table('products')->limit(2)->get(); // ambil 2 produk

        if ($products->count()) {
            $data = [];

            foreach ($products as $index => $product) {
                $data[] = [
                    'user_id' => $desiredUserId,
                    'product_id' => $product->id,
                    'quantity' => $index + 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            DB::table('carts')->insert($data);
        }
    }
}
