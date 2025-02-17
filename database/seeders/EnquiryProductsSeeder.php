<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EnquiryProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $enquiryProducts = [
            ['enquiry_id' => '1', 'product_id' => '1'],
            ['enquiry_id' => '2', 'product_id' => '2'],
            ['enquiry_id' => '3', 'product_id' => '3'],
            ['enquiry_id' => '4', 'product_id' => '1'],
            ['enquiry_id' => '5', 'product_id' => '2'],
            ['enquiry_id' => '6', 'product_id' => '3'],
            ['enquiry_id' => '7', 'product_id' => '1']
        ];

        DB::table('enquiry_products')->insert($enquiryProducts);
    }
}
