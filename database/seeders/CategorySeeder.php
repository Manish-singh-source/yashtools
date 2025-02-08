<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['category_name' => 'Electronics', 'category_image' => 'electronics.jpg'],
            ['category_name' => 'Fashion', 'category_image' => 'fashion.jpg'],
            ['category_name' => 'Home & Kitchen', 'category_image' => 'home-kitchen.jpg'],
            ['category_name' => 'Books', 'category_image' => 'books.jpg'],
            ['category_name' => 'Sports', 'category_image' => 'sports.jpg'],
        ];

        DB::table('categories')->insert($categories);
    }
}
