<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DummyUsersSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Ecommerce Admin',
                'email' => 'admin@ecommerce.com',
                'user_name' => 'ecommerce_admin',
                'role_id' => 1,
            ],
            [
                'name' => 'Ecommerce Shopkeeper',
                'email' => 'shopkeeper@ecommerce.com',
                'user_name' => 'ecommerce_shopkeeper',
                'role_id' => 2,
            ],
            [
                'name' => 'Ecommerce Customer',
                'email' => 'customer@ecommerce.com',
                'user_name' => 'ecommerce_customer',
                'role_id' => 3,
            ],
            [
                'name' => 'Ecommerce Support',
                'email' => 'support@ecommerce.com',
                'user_name' => 'ecommerce_support',
                'role_id' => 4,
            ],
            [
                'name' => 'Ecommerce Delivery Manager',
                'email' => 'delivery@ecommerce.com',
                'user_name' => 'ecommerce_delivery_manager',
                'role_id' => 5,
            ],
        ];

        foreach ($users as $user) {

            User::updateOrCreate(
                ['email' => $user['email']],
                [
                    'name'       => $user['name'],
                    'email'      => $user['email'],
                    'user_name'  => $user['user_name'],
                    'role_id'    => $user['role_id'],
                    'gender'     => 'Male',
                    'contact'    => '9999999999',
                    'address'    => 'Test Address',
                    'is_active'  => 1,
                    'auth_token' => Str::random(60),
                    'password'   => Hash::make('ecommerce123'),
                ]
            );
        }
    }
}