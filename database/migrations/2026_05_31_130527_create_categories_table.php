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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name');
            $table->integer('created_by')->default(1);
            $table->integer('is_active')->default(1);
            $table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('last_modified_on')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        DB::table('categories')->insert([
            ['category_name' => 'Electronics'],
            ['category_name' => 'Mobile Phones'],
            ['category_name' => 'Computers & Laptops'],
            ['category_name' => 'Fashion'],
            ['category_name' => "Men's Clothing"],
            ['category_name' => "Women's Clothing"],
            ['category_name' => 'Footwear'],
            ['category_name' => 'Watches'],
            ['category_name' => 'Beauty & Personal Care'],
            ['category_name' => 'Health & Wellness'],
            ['category_name' => 'Home & Kitchen'],
            ['category_name' => 'Furniture'],
            ['category_name' => 'Grocery'],
            ['category_name' => 'Books'],
            ['category_name' => 'Toys & Games'],
            ['category_name' => 'Sports & Fitness'],
            ['category_name' => 'Automotive'],
            ['category_name' => 'Jewellery'],
            ['category_name' => 'Baby Products'],
            ['category_name' => 'Pet Supplies'],
            ['category_name' => 'Office Supplies'],
            ['category_name' => 'Musical Instruments'],
            ['category_name' => 'Garden & Outdoor'],
            ['category_name' => 'Stationery'],
            ['category_name' => 'Bags & Luggage'],
            ['category_name' => 'Cameras'],
            ['category_name' => 'Gaming'],
            ['category_name' => 'Smart Devices'],
            ['category_name' => 'Appliances'],
            ['category_name' => 'Gifts & Crafts'],
            ['category_name' => 'Industrial Supplies'],
            ['category_name' => 'Construction Materials'],
            ['category_name' => 'Medical Equipment'],
            ['category_name' => 'Software'],
            ['category_name' => 'Digital Products'],
            ['category_name' => 'Subscription Services'],
            ['category_name' => 'Handmade Products'],
            ['category_name' => 'Art & Paintings'],
            ['category_name' => 'Travel Accessories'],
            ['category_name' => 'Bike Accessories'],
            ['category_name' => 'Car Accessories'],
            ['category_name' => 'Kitchen Appliances'],
            ['category_name' => 'Home Decor'],
            ['category_name' => 'Lighting'],
            ['category_name' => 'Security Systems'],
            ['category_name' => 'Fitness Equipment'],
            ['category_name' => 'Outdoor Equipment'],
            ['category_name' => 'Party Supplies'],
            ['category_name' => 'Religious Items'],
            ['category_name' => 'Collectibles']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};