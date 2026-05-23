<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('roles')->where('id', 1)->update([
            'role_name' => 'Admin',
        ]);

        DB::table('roles')->where('id', 2)->update([
            'role_name' => 'Shopkeeper',
        ]);

        DB::table('roles')->where('id', 3)->update([
            'role_name' => 'Customer',
        ]);

        // Optional extra roles
        DB::table('roles')->insert([
            [
                'role_name' => 'Support',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_name' => 'Delivery Manager',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role_name' => 'Inventory Manager',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down(): void
    {
        DB::table('roles')->where('id', 1)->update([
            'role_name' => 'Owner',
        ]);

        DB::table('roles')->where('id', 2)->update([
            'role_name' => 'Order Manager',
        ]);

        DB::table('roles')->where('id', 3)->update([
            'role_name' => 'Support',
        ]);

        DB::table('roles')->whereIn('role_name', [
            'Customer',
            'Delivery Manager',
            'Inventory Manager'
        ])->delete();
    }
};