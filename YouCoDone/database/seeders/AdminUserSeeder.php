<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run()
    {



        $admin = User::firstOrCreate(
            ['email' => 'admin@restaurant.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('Admin123!'),
                'role' => 'admin',
                'phone' => '0600000000',
                'city' => 'safi',
            ]
        );

        $client = User::firstOrCreate(
            ['email' => 'cherkaouim154@gmail.com'],
            [
                'name' => 'Mehdi Restau',
                'password' => Hash::make('Mestry451'),
                'role' => 'restaurant',
                'phone' => '0600000000',
                'city' => 'safi',
            ]
        );

        $restaurateur = User::firstOrCreate(
            ['email' => 'cherkaouim451@gmail.com'],
            [
                'name' => 'Mehdi Client',
                'password' => Hash::make('Mestry451'),
                'role' => 'client',
                'phone' => '0600000000',
                'city' => 'safi',
            ]
        );

        $admin->assignRole('admin');
        $client->assignRole('client');
        $restaurateur->assignRole('restaurant');
    }
}