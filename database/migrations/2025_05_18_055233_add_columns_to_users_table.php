<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('user_name')->unique()->after('gender');
            $table->string('auth_token')->nullable()->after('user_name');
            $table->string('address')->nullable()->after('auth_token');
            $table->string('is_active')->nullable()->default(1)->after('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['user_name', 'auth_token', 'address', 'is_active']);
        });
    }
};
