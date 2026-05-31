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
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->string('sub_category_name');
            $table->integer('category_id');
            $table->integer('created_by')->default(1);
            $table->integer('is_active')->default(1);
            $table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('last_modified_on')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });

        DB::table('sub_categories')->insert([

            // Electronics (1)
            ['sub_category_name' => 'Televisions', 'category_id' => 1],
            ['sub_category_name' => 'Speakers', 'category_id' => 1],
            ['sub_category_name' => 'Headphones', 'category_id' => 1],
            ['sub_category_name' => 'Power Banks', 'category_id' => 1],
            ['sub_category_name' => 'Smart Watches', 'category_id' => 1],

            // Mobile Phones (2)
            ['sub_category_name' => 'Android Phones', 'category_id' => 2],
            ['sub_category_name' => 'iPhones', 'category_id' => 2],
            ['sub_category_name' => 'Chargers', 'category_id' => 2],
            ['sub_category_name' => 'Screen Protectors', 'category_id' => 2],
            ['sub_category_name' => 'Mobile Cases', 'category_id' => 2],

            // Computers & Laptops (3)
            ['sub_category_name' => 'Laptops', 'category_id' => 3],
            ['sub_category_name' => 'Desktops', 'category_id' => 3],
            ['sub_category_name' => 'Monitors', 'category_id' => 3],
            ['sub_category_name' => 'Keyboards', 'category_id' => 3],
            ['sub_category_name' => 'Mouse', 'category_id' => 3],

            // Fashion (4)
            ['sub_category_name' => 'Men Fashion', 'category_id' => 4],
            ['sub_category_name' => 'Women Fashion', 'category_id' => 4],
            ['sub_category_name' => 'Kids Fashion', 'category_id' => 4],

            // Men's Clothing (5)
            ['sub_category_name' => 'Shirts', 'category_id' => 5],
            ['sub_category_name' => 'T-Shirts', 'category_id' => 5],
            ['sub_category_name' => 'Jeans', 'category_id' => 5],
            ['sub_category_name' => 'Trousers', 'category_id' => 5],
            ['sub_category_name' => 'Jackets', 'category_id' => 5],

            // Women's Clothing (6)
            ['sub_category_name' => 'Sarees', 'category_id' => 6],
            ['sub_category_name' => 'Kurtis', 'category_id' => 6],
            ['sub_category_name' => 'Dresses', 'category_id' => 6],
            ['sub_category_name' => 'Tops', 'category_id' => 6],
            ['sub_category_name' => 'Leggings', 'category_id' => 6],

            // Footwear (7)
            ['sub_category_name' => 'Sports Shoes', 'category_id' => 7],
            ['sub_category_name' => 'Casual Shoes', 'category_id' => 7],
            ['sub_category_name' => 'Sandals', 'category_id' => 7],
            ['sub_category_name' => 'Boots', 'category_id' => 7],

            // Watches (8)
            ['sub_category_name' => 'Analog Watches', 'category_id' => 8],
            ['sub_category_name' => 'Digital Watches', 'category_id' => 8],
            ['sub_category_name' => 'Smart Watches', 'category_id' => 8],

            // Beauty & Personal Care (9)
            ['sub_category_name' => 'Skin Care', 'category_id' => 9],
            ['sub_category_name' => 'Hair Care', 'category_id' => 9],
            ['sub_category_name' => 'Makeup', 'category_id' => 9],
            ['sub_category_name' => 'Perfumes', 'category_id' => 9],

            // Home & Kitchen (11)
            ['sub_category_name' => 'Cookware', 'category_id' => 11],
            ['sub_category_name' => 'Kitchen Tools', 'category_id' => 11],
            ['sub_category_name' => 'Storage Containers', 'category_id' => 11],
            ['sub_category_name' => 'Dining Sets', 'category_id' => 11],

            // Furniture (12)
            ['sub_category_name' => 'Beds', 'category_id' => 12],
            ['sub_category_name' => 'Sofas', 'category_id' => 12],
            ['sub_category_name' => 'Dining Tables', 'category_id' => 12],
            ['sub_category_name' => 'Office Chairs', 'category_id' => 12],

            // Books (14)
            ['sub_category_name' => 'Fiction', 'category_id' => 14],
            ['sub_category_name' => 'Non Fiction', 'category_id' => 14],
            ['sub_category_name' => 'Educational', 'category_id' => 14],
            ['sub_category_name' => 'Competitive Exams', 'category_id' => 14],

            // Sports & Fitness (16)
            ['sub_category_name' => 'Dumbbells', 'category_id' => 16],
            ['sub_category_name' => 'Yoga Mats', 'category_id' => 16],
            ['sub_category_name' => 'Treadmills', 'category_id' => 16],
            ['sub_category_name' => 'Cricket Equipment', 'category_id' => 16],

            // Automotive (17)
            ['sub_category_name' => 'Car Accessories', 'category_id' => 17],
            ['sub_category_name' => 'Bike Accessories', 'category_id' => 17],
            ['sub_category_name' => 'Tyres', 'category_id' => 17],
            ['sub_category_name' => 'Car Care', 'category_id' => 17],

            // Baby Products (19)
            ['sub_category_name' => 'Baby Toys', 'category_id' => 19],
            ['sub_category_name' => 'Baby Clothing', 'category_id' => 19],
            ['sub_category_name' => 'Diapers', 'category_id' => 19],

            // Pet Supplies (20)
            ['sub_category_name' => 'Dog Food', 'category_id' => 20],
            ['sub_category_name' => 'Cat Food', 'category_id' => 20],
            ['sub_category_name' => 'Pet Toys', 'category_id' => 20],

            // Cameras (26)
            ['sub_category_name' => 'DSLR Cameras', 'category_id' => 26],
            ['sub_category_name' => 'Mirrorless Cameras', 'category_id' => 26],
            ['sub_category_name' => 'Camera Lenses', 'category_id' => 26],

            // Gaming (27)
            ['sub_category_name' => 'Gaming Consoles', 'category_id' => 27],
            ['sub_category_name' => 'Gaming Laptops', 'category_id' => 27],
            ['sub_category_name' => 'Gaming Keyboards', 'category_id' => 27],
            ['sub_category_name' => 'Video Games', 'category_id' => 27],

            // Appliances (29)
            ['sub_category_name' => 'Refrigerators', 'category_id' => 29],
            ['sub_category_name' => 'Washing Machines', 'category_id' => 29],
            ['sub_category_name' => 'Air Conditioners', 'category_id' => 29],
            ['sub_category_name' => 'Microwave Ovens', 'category_id' => 29],

            // Home Decor (43)
            ['sub_category_name' => 'Wall Art', 'category_id' => 43],
            ['sub_category_name' => 'Curtains', 'category_id' => 43],
            ['sub_category_name' => 'Showpieces', 'category_id' => 43],

            // Fitness Equipment (46)
            ['sub_category_name' => 'Exercise Bikes', 'category_id' => 46],
            ['sub_category_name' => 'Weight Benches', 'category_id' => 46],
            ['sub_category_name' => 'Resistance Bands', 'category_id' => 46],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_categories');
    }
};