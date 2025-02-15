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
            ['category_name' => 'Electronics', 'category_image' => 'electronics.jpg', 'category_slug' => 'electronics'],
            ['category_name' => 'Fashion', 'category_image' => 'fashion.jpg', 'category_slug' => 'fashion'],
            ['category_name' => 'Home & Kitchen', 'category_image' => 'home-kitchen.jpg', 'category_slug' => 'home-and-kitchen'],
            ['category_name' => 'Books', 'category_image' => 'books.jpg', 'category_slug' => 'books'],
            ['category_name' => 'Sports', 'category_image' => 'sports.jpg', 'category_slug' => 'sports'],
        ];

        DB::table('categories')->insert($categories);
    }
}
