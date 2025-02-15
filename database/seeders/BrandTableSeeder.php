<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['brand_name' => 'tools', 'brand_image' => '1739167483.jpg', 'brand_slug' => 'tools'],
            ['brand_name' => 'nike', 'brand_image' => '1739167483.jpg', 'brand_slug' => 'nike'],
            ['brand_name' => 'adidas', 'brand_image' => '1739167483.jpg', 'brand_slug' => 'adidas'],
            ['brand_name' => 'samsung', 'brand_image' => '1739167483.jpg', 'brand_slug' => 'samsung'],
            ['brand_name' => 'apple', 'brand_image' => '1739167483.jpg', 'brand_slug' => 'apple'],
            ['brand_name' => 'sony', 'brand_image' => '1739167483.jpg', 'brand_slug' => 'sony'],
            ['brand_name' => 'lg', 'brand_image' => '1739167483.jpg', 'brand_slug' => 'lg']
        ];

        DB::table('brands')->insert($brands);
    }
}
