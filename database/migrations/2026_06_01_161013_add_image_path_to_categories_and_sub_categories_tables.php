<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('image_path')->nullable()->after('category_name');
        });

        Schema::table('sub_categories', function (Blueprint $table) {
            $table->string('image_path')->nullable()->after('sub_category_name');
        });

        DB::table('categories')
            ->where('category_name', 'Electronics')
            ->update([
                'image_path' => 'images/categories/Electronics.png'
            ]);

        DB::table('categories')
            ->where('category_name', 'Mobile Phones')
            ->update([
                'image_path' => 'images/categories/Mobile_Phones.png'
            ]);

        DB::table('categories')
            ->where('category_name', 'Computers & Laptops')
            ->update([
                'image_path' => 'images/categories/Computers_Laptops.png'
            ]);

        DB::table('categories')
            ->where('category_name', 'Fashion')
            ->update([
                'image_path' => 'images/categories/Fashion.png'
            ]);

        DB::table('categories')
            ->where('category_name', "Men's Clothing")
            ->update([
                'image_path' => 'images/categories/Mens_Clothing.png'
            ]);

        DB::table('categories')
            ->where('category_name', "Women's Clothing")
            ->update([
                'image_path' => 'images/categories/Womens_Clothing.jpg'
            ]);

        DB::table('categories')
            ->where('category_name', 'Footwear')
            ->update([
                'image_path' => 'images/categories/Footwear.png'
            ]);

        DB::table('categories')
            ->where('category_name', 'Watches')
            ->update([
                'image_path' => 'images/categories/Watches.png'
            ]);

        DB::table('categories')
            ->where('category_name', 'Beauty & Personal Care')
            ->update([
                'image_path' => 'images/categories/Beauty_Personal_Care.jpg'
            ]);

        DB::table('categories')
            ->where('category_name', 'Health & Wellness')
            ->update([
                'image_path' => 'images/categories/Health_Wellness.png'
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn('image_path');
        });

        Schema::table('sub_categories', function (Blueprint $table) {
            $table->dropColumn('image_path');
        });
    }
};