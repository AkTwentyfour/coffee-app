<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Comodities;

class ComoditiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        DB::table('comodities')->insert([

            // Coffee
            ['name' => 'American Style', 'price' => 10000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 1],
            ['name' => 'Cappuccino', 'price' => 16000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 1],
            ['name' => 'Mocha', 'price' => 18000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 1],
            ['name' => 'Caffe Latte', 'price' => 16000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 1],
            ['name' => 'Caramel Latte', 'price' => 18000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 1],
            ['name' => 'Vanilla Latte', 'price' => 18000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 1],
            ['name' => 'Hazulnate Latte', 'price' => 18000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 1],
            ['name' => 'Java Coffee', 'price' => 17000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 1],
            ['name' => 'Sweety Pink Latte', 'price' => 17000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 1],

            // Non Coffee
            ['name' => 'Jasmin Tea', 'price' => 5000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 2],
            ['name' => 'Lecy Tea', 'price' => 13000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 2],
            ['name' => 'Thai Tea', 'price' => 12000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 2],
            ['name' => 'Lemon Tea', 'price' => 12000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 2],
            ['name' => 'Lemonade Freez', 'price' => 13000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 2],
            ['name' => 'Purple Sweet Latte', 'price' => 16000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 2],
            ['name' => 'Matcha Latte', 'price' => 18000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 2],
            ['name' => 'Choconese Latte', 'price' => 16000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 2],
            ['name' => 'Red Velvet Latte', 'price' => 16000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 2],

            // Mocktail
            ['name' => 'Red Berry', 'price' => 17000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 3],
            ['name' => 'Green Kiwi', 'price' => 18000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 3],
            ['name' => 'Sweety Lecy', 'price' => 18000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 3],
            ['name' => 'Originaly Lime', 'price' => 15000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 3],
            ['name' => 'Blue Curacao', 'price' => 17000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 3],

            // Indomie Varian
            ['name' => 'Goreng Original', 'price' => 7000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 4],
            ['name' => 'Goreng Telur Sosis', 'price' => 15000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 4],
            ['name' => 'Goreng Telur Smoke Beef', 'price' => 15000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 4],
            ['name' => 'Goreng Sosis Smoke Beef', 'price' => 16000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 4],
            ['name' => 'Goreng Special', 'price' => 23000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 4],
            ['name' => 'Kuah Original', 'price' => 7000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 4],
            ['name' => 'Kuah Telur Sosis', 'price' => 16000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 4],
            ['name' => 'Kuah Susu Special', 'price' => 20000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 4],

            // Other
            ['name' => 'French Fries', 'price' => 7000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 5],
            ['name' => 'Cireg Crispy', 'price' => 10000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 5],
            ['name' => 'Cireng Isi Ayam', 'price' => 15000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 5],
            ['name' => 'Kebab Mini', 'price' => 18000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 5],
            ['name' => 'Mix Platter', 'price' => 23000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 5],
            ['name' => 'Sosis Klasik', 'price' => 23000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 5],
            ['name' => 'Nugget Crispy', 'price' => 15000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 5],
            ['name' => 'Pisang Coklat', 'price' => 13000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 5],

            // Bakeri
            ['name' => 'Roti Bakar Legit', 'price' => 15000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 6],
            ['name' => 'Roti Maryam Original', 'price' => 7000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 6],
            ['name' => 'Roti Maryam Coklat', 'price' => 10000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 6],
            ['name' => 'Roti Maryam Keju Susu', 'price' => 13000, 'cogs' => 8000, 'stock' => 100, 'comodity_category_id' => 6],

        ]);
    }
}
