<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    public function run(): void
    {
        $users = DB::table('users')->limit(2)->get(); // ambil max 2 user
        $products = DB::table('products')->get();

        $orders = [];

        foreach ($users as $i => $user) {
            // gunakan dua produk berbeda untuk tiap user
            foreach ($products->take(2) as $j => $product) {
                $qty = $j + 1;
                $orders[] = [
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                    'quantity' => $qty,
                    'total_price' => $product->price * $qty,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('orders')->insert($orders);
    }
}