<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            ['product_name' => 'Yash tools', 'product_quantity' => '500', 'product_price' => '590', 'product_dispatch' => 'Same day', 'product_discription' => 'asfgsadfg wetrfe trfwertgewtg ewtfg', 'product_thumbain' => '1739278617.png' , 'product_brand_id' => '5' , 'product_category_id' => '2' , 'product_sub_category_id' => '1'],
            ['product_name' => 'Power Drill', 'product_quantity' => '300', 'product_price' => '1200', 'product_dispatch' => 'Same day', 'product_discription' => 'High power drill machine for heavy duty work', 'product_thumbain' => '1739278618.png' , 'product_brand_id' => '5' , 'product_category_id' => '2' , 'product_sub_category_id' => '1'],
            ['product_name' => 'Hammer Set', 'product_quantity' => '200', 'product_price' => '450', 'product_dispatch' => 'Next day', 'product_discription' => 'Durable hammer set with ergonomic grip', 'product_thumbain' => '1739278619.png' , 'product_brand_id' => '5' , 'product_category_id' => '2' , 'product_sub_category_id' => '1'],
            ['product_name' => 'Screwdriver Kit', 'product_quantity' => '600', 'product_price' => '350', 'product_dispatch' => 'Same day', 'product_discription' => 'Multi-functional screwdriver kit with multiple heads', 'product_thumbain' => '1739278620.png' , 'product_brand_id' => '5' , 'product_category_id' => '2' , 'product_sub_category_id' => '1'],
            ['product_name' => 'Wrench Set', 'product_quantity' => '400', 'product_price' => '800', 'product_dispatch' => '2 days', 'product_discription' => 'Adjustable wrench set suitable for all sizes', 'product_thumbain' => '1739278621.png' , 'product_brand_id' => '5' , 'product_category_id' => '2' , 'product_sub_category_id' => '1'],
            ['product_name' => 'Toolbox', 'product_quantity' => '150', 'product_price' => '1500', 'product_dispatch' => 'Same day', 'product_discription' => 'Spacious and portable toolbox for professionals', 'product_thumbain' => '1739278622.png' , 'product_brand_id' => '5' , 'product_category_id' => '2' , 'product_sub_category_id' => '1'],
            ['product_name' => 'Electric Saw', 'product_quantity' => '250', 'product_price' => '2500', 'product_dispatch' => 'Next day', 'product_discription' => 'High precision electric saw for cutting wood and metal', 'product_thumbain' => '1739278623.png' , 'product_brand_id' => '5' , 'product_category_id' => '2' , 'product_sub_category_id' => '1']
        ];

        DB::table('products')->insert($products);
    }
}
