<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    $users = [
        [
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'address' => 'Riyadh, Saudi Arabia',
            'phone' => '+966500000000',
            'isAdmin' => '1',
            'passport' => 'A123456789',
            'role' => 'admin',
            'imageUrl' => '/images/admin.jpg',
        ],
        [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'address' => 'Jeddah, Saudi Arabia',
            'phone' => '+966500000001',
            'isAdmin' => '0',
            'passport' => 'B123456789',
            'role' => 'user',
            'imageUrl' => '/images/user1.jpg',
        ],
        [
            'name' => 'Sara Mohammad',
            'email' => 'sara@example.com',
            'password' => Hash::make('password'),
            'address' => 'Dammam, Saudi Arabia',
            'phone' => '+966500000002',
            'isAdmin' => '0',
            'passport' => 'C123456789',
            'role' => 'user',
            'imageUrl' => '/images/user2.jpg',
        ],
        [
            'name' => 'Ahmad Ali',
            'email' => 'ahmad@example.com',
            'password' => Hash::make('password'),
            'address' => 'Makkah, Saudi Arabia',
            'phone' => '+966500000003',
            'isAdmin' => '0',
            'passport' => 'D123456789',
            'role' => 'user',
            'imageUrl' => '/images/user3.jpg',
        ],
        [
            'name' => 'Fatima Omar',
            'email' => 'fatima@example.com',
            'password' => Hash::make('password'),
            'address' => 'Medina, Saudi Arabia',
            'phone' => '+966500000004',
            'isAdmin' => '0',
            'passport' => 'E123456789',
            'role' => 'user',
            'imageUrl' => '/images/user4.jpg',
        ],
    ];

    foreach ($users as $user) {
        User::create($user);
    }
}
}
