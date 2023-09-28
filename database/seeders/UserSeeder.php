<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Buat peran jika belum ada
        $adminRole = Role::where('name', 'Admin')->first();
        $buyerRole = Role::where('name', 'Pembeli')->first();
        $sellerRole = Role::where('name', 'Penjual')->first();

        // Buat pengguna dengan peran Admin
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole($adminRole);

        // Buat pengguna dengan peran Pembeli
        $buyer = User::create([
            'name' => 'Buyer User',
            'email' => 'buyer@example.com',
            'password' => bcrypt('password'),
        ]);
        $buyer->assignRole($buyerRole);

        // Buat pengguna dengan peran Penjual
        $seller = User::create([
            'name' => 'Seller User',
            'email' => 'seller@example.com',
            'password' => bcrypt('password'),
        ]);
        $seller->assignRole($sellerRole);
    }
}
