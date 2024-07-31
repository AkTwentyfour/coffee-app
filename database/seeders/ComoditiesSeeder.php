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

        // Comodities::create([
        //     'name' => 'Es Kopi', 'price' => 10000, 'stock' => 10, 'category' => 'beverage'
        // ]);

        DB::table('comodities')->insert([
            ['name' => 'Es Kopi', 'price' => 10000, 'stock' => 10, 'category' => 'beverage'],
            ['name' => 'Mix Plate', 'price' => 12000, 'stock' => 10, 'category' => 'food'],
            ['name' => 'Mojito', 'price' => 15000, 'stock' => 10, 'category' => 'beverage'],
            ['name' => 'Es kecubung', 'price' => 14000, 'stock' => 10, 'category' => 'beverage'],
            ['name' => 'salad komodo', 'price' => 20000, 'stock' => 10, 'category' => 'food'],
            ['name' => 'alpukat ngocok', 'price' => 10000, 'stock' => 10, 'category' => 'beverage'],
            ['name' => 'sang pisang', 'price' => 15000, 'stock' => 10, 'category' => 'food'],
            ['name' => 'Americano', 'price' => 18000, 'stock' => 10, 'category' => 'beverage'],
            ['name' => 'french Fries', 'price' => 10000, 'stock' => 10, 'category' => 'food'],
        ]);
    }
}
