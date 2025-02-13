<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Using Eloquent to insert data
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => bcrypt('password')
        ]);

        // Using DB facade to insert data directly into the database
        DB::table('users')->insert([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'password' => bcrypt('password')
        ]);
    }
}
