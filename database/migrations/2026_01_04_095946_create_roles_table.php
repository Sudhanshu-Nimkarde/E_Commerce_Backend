<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role_name')->unique();
            $table->timestamps();
        });

        // ✅ Insert default roles
        DB::table('roles')->insert([
            ['id' => 1, 'role_name' => 'Owner', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'role_name' => 'Order Manager', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'role_name' => 'Support', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
