<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EnquiryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $enquiry = [
            ['products_id' => '1' , 'enquiry_id' => '173' , 'customer_id' => '1' , 'status' => '1'],
            ['products_id' => '2'  , 'enquiry_id' => '173' , 'customer_id' => '1', 'status' => '1'],
            ['products_id' => '3' , 'enquiry_id' => '173' , 'customer_id' => '1', 'status' => '1'],
            ['products_id' => '4' , 'enquiry_id' => '173' , 'customer_id' => '1', 'status' => '1'],
            ['products_id' => '5' , 'enquiry_id' => '173' , 'customer_id' => '1', 'status' => '1'],
            ['products_id' => '6' , 'enquiry_id' => '173' , 'customer_id' => '1', 'status' => '1'],
            ['products_id' => '7' , 'enquiry_id' => '173' , 'customer_id' => '1' , 'status' => '1']
        ];

        DB::table('enquiry')->insert($enquiry);
    }
}
