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
            ['enquiry_id' => '90011', 'customer_id' => '1', 'status' => 'confirmed'],
            ['enquiry_id' => '90012', 'customer_id' => '1', 'status' => 'confirmed'],
            ['enquiry_id' => '90013', 'customer_id' => '1', 'status' => 'confirmed'],
            ['enquiry_id' => '90014', 'customer_id' => '1', 'status' => 'confirmed'],
            ['enquiry_id' => '90015', 'customer_id' => '1', 'status' => 'confirmed'],
            ['enquiry_id' => '90016', 'customer_id' => '1', 'status' => 'confirmed'],
            ['enquiry_id' => '90017', 'customer_id' => '1', 'status' => 'confirmed']
        ];

        DB::table('enquiries')->insert($enquiry);
    }
}
