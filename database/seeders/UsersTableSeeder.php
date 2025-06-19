<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $userEmail = 'indra@example.com';

        $exists = DB::table('users')->where('email', $userEmail)->exists();

        if (!$exists) {
            DB::table('users')->insert([
                'name' => 'Indra Wirawan',
                'email' => $userEmail,
                'password' => Hash::make('password'), // ganti sesuai kebutuhan
                'phone' => '081234567890',
                'address' => 'Jl. Raya Jember No.123',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}