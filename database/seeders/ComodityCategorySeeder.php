<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComodityCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comodity_categories')->insert([
            ["name" => "coffee"],
            ["name" => "non coffe"],
            ["name" => "mocktail"],
            ["name" => "indomie varian"],
            ["name" => "other"],
            ["name" => "bakeri"]
        ]);
    }
}
