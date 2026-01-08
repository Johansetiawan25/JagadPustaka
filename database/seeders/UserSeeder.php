<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'admin123', // kamu pakai plain password
            'role' => 'admin'
        ]);

        // Customer 1
        User::create([
            'name' => 'Customer 1',
            'email' => 'customer1@gmail.com',
            'password' => 'customer',
            'role' => 'customer'
        ]);

        // Customer 2
        User::create([
            'name' => 'Customer 2',
            'email' => 'customer2@gmail.com',
            'password' => 'customer',
            'role' => 'customer'
        ]);

        // Customer 3
        User::create([
            'name' => 'Customer 3',
            'email' => 'customer3@gmail.com',
            'password' => 'customer',
            'role' => 'customer'
        ]);
    }
}
