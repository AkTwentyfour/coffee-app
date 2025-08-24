<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            ["name"=> "Admin", "email"=> "kamaludina95@gmail.com", 'role'=> 'admin', "password"=> hash::make("password")],
            ["name"=> "Cashier", "email"=> "staffmahjong@gmail.com", 'role'=> 'user', "password"=> hash::make("password")],
        ]);
    }
}
