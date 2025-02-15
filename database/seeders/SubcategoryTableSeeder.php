<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubcategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sub_categories = [
            ['sub_category_name' => 'fashion', 'category_id' => ' 1', 'sub_category_image' => '1739279459.png', 'subcategory_slug' => 'fashion'],
            ['sub_category_name' => 'electronics', 'category_id' => ' 2', 'sub_category_image' => '1739279459.png', 'subcategory_slug' => 'electronics'],
            ['sub_category_name' => 'home_appliances', 'category_id' => ' 3', 'sub_category_image' => '1739279459.png', 'subcategory_slug' => 'home-appliances'],
            ['sub_category_name' => 'books', 'category_id' => ' 4', 'sub_category_image' => '1739279459.png', 'subcategory_slug' => 'books'],
            ['sub_category_name' => 'toys', 'category_id' => ' 5', 'sub_category_image' => '1739279459.png', 'subcategory_slug' => 'toys'],
            ['sub_category_name' => 'sports', 'category_id' => ' 6', 'sub_category_image' => '1739279459.png', 'subcategory_slug' => 'sports'],
            ['sub_category_name' => 'beauty', 'category_id' => ' 7', 'sub_category_image' => '1739279459.png', 'subcategory_slug' => 'beauty'],
        ];

        DB::table('sub_categories')->insert($sub_categories);
    }
}
