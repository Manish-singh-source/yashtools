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
            ['brand_name' => 'tools' , 'brand_image' => '1739167483.jpg'],
            ['brand_name' => 'nike'  , 'brand_image' => '1739167483.jpg'],
            ['brand_name' => 'adidas' , 'brand_image' => '1739167483.jpg'],
            ['brand_name' => 'samsung' , 'brand_image' => '1739167483.jpg'],
            ['brand_name' => 'apple' , 'brand_image' => '1739167483.jpg'],
            ['brand_name' => 'sony' , 'brand_image' => '1739167483.jpg'],
            ['brand_name' => 'lg' , 'brand_image' => '1739167483.jpg']
        ];

        DB::table('brands')->insert($brands);
    }
}
