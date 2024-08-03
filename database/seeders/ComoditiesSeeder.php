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
            ['name' => 'Kopi Susu', 'price' => 15000, 'stock' => 100, 'category' => 'coffee'],
            ['name' => 'Kopi Hitam', 'price' => 13000, 'stock' => 100, 'category' => 'coffee'],
            ['name' => 'Kopi Saring', 'price' => 13000, 'stock' => 100, 'category' => 'coffee'],
            ['name' => 'Kopi Barbar', 'price' => 17000, 'stock' => 100, 'category' => 'coffee'],
            ['name' => 'Kopi Kacang', 'price' => 17000, 'stock' => 100, 'category' => 'coffee'],
            ['name' => 'Kopi Mawar', 'price' => 17000, 'stock' => 100, 'category' => 'coffee'],
            ['name' => 'Kopi Kelapa', 'price' => 17000, 'stock' => 100, 'category' => 'coffee'],
            ['name' => 'Kopi Gula Aren', 'price' => 17000, 'stock' => 100, 'category' => 'coffee'],
            ['name' => 'Kopi Cocontol', 'price' => 17000, 'stock' => 100, 'category' => 'coffee'],
            ['name' => 'Kopi Susu Coklat', 'price' => 15000, 'stock' => 100, 'category' => 'coffee'],
            
            ['name' => 'Kopassus', 'price' => 10000, 'stock' => 100, 'category' => 'traditional_coffee'],
            ['name' => 'Sukoco', 'price' => 10000, 'stock' => 100, 'category' => 'traditional_coffee'],
            ['name' => 'Kopyok', 'price' => 10000, 'stock' => 100, 'category' => 'traditional_coffee'],

            ['name' => 'Coklat Kelapa', 'price' => 13000, 'stock' => 100, 'category' => 'non_coffee'],
            ['name' => 'Coklat Original', 'price' => 13000, 'stock' => 100, 'category' => 'non_coffee'],
            ['name' => 'Coklat Kacang', 'price' => 13000, 'stock' => 100, 'category' => 'non_coffee'],
            ['name' => 'Matcha', 'price' => 13000, 'stock' => 100, 'category' => 'non_coffee'],
            ['name' => 'Red Velvet', 'price' => 13000, 'stock' => 100, 'category' => 'non_coffee'],

            ['name' => 'Kentang', 'price' => 10000, 'stock' => 100, 'category' => 'snack'],
            ['name' => 'Risol isi Ayam', 'price' => 12000, 'stock' => 100, 'category' => 'snack'],
            ['name' => 'Risol isi Coklat', 'price' => 12000, 'stock' => 100, 'category' => 'snack'],
            ['name' => 'Lumpia isi Ayam', 'price' => 12000, 'stock' => 100, 'category' => 'snack'],
            ['name' => 'Pangsit Goreng', 'price' => 12000, 'stock' => 100, 'category' => 'snack'],
            ['name' => 'Pumpuk', 'price' => 10000, 'stock' => 100, 'category' => 'snack'],

            ['name' => 'Mie Goreng', 'price' => 8000, 'stock' => 100, 'category' => 'heavy_meal'],
            ['name' => 'Mie Rebus', 'price' => 8000, 'stock' => 100, 'category' => 'heavy_meal'],
            ['name' => 'Mie Goreng Telor', 'price' => 12000, 'stock' => 100, 'category' => 'heavy_meal'],
            ['name' => 'Mie Rebus Telor', 'price' => 12000, 'stock' => 100, 'category' => 'heavy_meal'],
            ['name' => 'Mie Gemladag', 'price' => 12000, 'stock' => 100, 'category' => 'heavy_meal'],
        ]);
    }
}
