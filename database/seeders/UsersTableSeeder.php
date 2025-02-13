<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['fullname' => 'Manish Singh', 'username' => 'Manish', 'email' => 'abc@gmail.com', 'mobile_number' => '70395534078', 'password' => 'abcs'],
            ['fullname' => 'Rohit Sharma', 'username' => 'Rohit', 'email' => 'rohit@gmail.com', 'mobile_number' => '70395534079', 'password' => 'rohits'],
            ['fullname' => 'Priya Mehta', 'username' => 'Priya', 'email' => 'priya@gmail.com', 'mobile_number' => '70395534080', 'password' => 'priyas'],
            ['fullname' => 'Amit Kumar', 'username' => 'Amit', 'email' => 'amit@gmail.com', 'mobile_number' => '70395534081', 'password' => 'amits'],
            ['fullname' => 'Neha Gupta', 'username' => 'Neha', 'email' => 'neha@gmail.com', 'mobile_number' => '70395534082', 'password' => 'nehas'],
            ['fullname' => 'Vikas Yadav', 'username' => 'Vikas', 'email' => 'vikas@gmail.com', 'mobile_number' => '70395534083', 'password' => 'vikass'],
            ['fullname' => 'Anjali Verma', 'username' => 'Anjali', 'email' => 'anjali@gmail.com', 'mobile_number' => '70395534084', 'password' => 'anjalis']  
        ];

        DB::table('users')->insert($users);
    }
}
