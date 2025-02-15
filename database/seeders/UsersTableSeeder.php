<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    protected static ?string $password;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['fullname' => 'Manish Singh', 'username' => 'Manish', 'email' => 'abc@gmail.com', 'mobile_number' => '70395534078', 'password' => static::$password ??= Hash::make('manish')],
            ['fullname' => 'Rohit Sharma', 'username' => 'Rohit', 'email' => 'rohit@gmail.com', 'mobile_number' => '70395534079', 'password' => static::$password ??= Hash::make('rohits')],
            ['fullname' => 'Priya Mehta', 'username' => 'Priya', 'email' => 'priya@gmail.com', 'mobile_number' => '70395534080', 'password' => static::$password ??= Hash::make('priyas')],
            ['fullname' => 'Amit Kumar', 'username' => 'Amit', 'email' => 'amit@gmail.com', 'mobile_number' => '70395534081', 'password' => static::$password ??= Hash::make('amits')],
            ['fullname' => 'Neha Gupta', 'username' => 'Neha', 'email' => 'neha@gmail.com', 'mobile_number' => '70395534082', 'password' => static::$password ??= Hash::make('nehas')],
            ['fullname' => 'Vikas Yadav', 'username' => 'Vikas', 'email' => 'vikas@gmail.com', 'mobile_number' => '70395534083', 'password' => static::$password ??= Hash::make('vikass')],
            ['fullname' => 'Anjali Verma', 'username' => 'Anjali', 'email' => 'anjali@gmail.com', 'mobile_number' => '70395534084', 'password' => static::$password ??= Hash::make('anjalis')]  
        ];

        DB::table('users')->insert($users);
    }
}
