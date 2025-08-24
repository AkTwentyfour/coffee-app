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
            // [
            //     'name' => 'Aquarium Hias',
            //     'price' => 450000,
            //     'cogs' => 450000,
            //     'stock' => '100',
            //     "category" => 'coffee',
            //     'images' => 'aquarium-hias.png',
            // ],

            // [
            //     'name' => 'Guci Keramik',
            //     'price' => 95000,
            //     'cogs' => 95000,
            //     'stock' => '100',
            //     "category" => 'coffee',
            //     'images' => 'guci-keramik.png',
            // ],

            // [
            //     'name' => 'Asbak Kayu',
            //     'price' => 15000,
            //     'cogs' => 15000,
            //     'stock' => '100',
            //     "category" => 'coffee',
            //     'images' => 'asbak-kayu.png',
            // ],

            // [
            //     'name' => 'Tas Rajut',
            //     'price' => 45000,
            //     'cogs' => 45000,
            //     'stock' => '100',
            //     "category" => 'coffee',,
            //     'images' => 'tas-rajut.png',
            // ],

            // [
            //     'name' => 'Topi Kulit',
            //     'price' => 55000,
            //     'cogs' => 55000,
            //     'stock' => '100',
            //     "category" => 'coffee',,
            //     'images' => 'topi-kulit.png',
            // ],

            // [
            //     'name' => 'Guci Hias',
            //     'price' => 105000,
            //     'cogs' => 105000,
            //     'stock' => '100',,
            //     "category" => 'coffee',
            //     'images' => 'guci-hias.png',
            // ],

            // [
            //     'name' => 'Miniatur Vespa',
            //     'price' => 15000,
            //     'cogs' => 15000,
            //     'stock' => '100',
            //     "category" => 'coffee',,
            //     'images' => 'miniatur-vespa.png',
            // ],

            // [
            //     'name' => 'Ulekan Batu',
            //     'price' => 85000,
            //     'cogs' => 85000,
            //     'stock' => '100',
            //     "category" => 'coffee',,
            //     'images' => 'ulekan-batu.png',
            // ],
            // [
            //     'name' => 'Cangkir Klasik',
            //     'price' => 65000,
            //     'cogs' => 65000,
            //     'stock' => '100',
            //     "category" => 'coffee',,
            //     'images' => 'cangkir-klasik.png',
            // ],
            // [
            //     'name' => 'Hiasan Dinding',
            //     'price' => 1,
            //     'cogs' => 1,
            //     'stock' => '100',
            //     "category" => 'coffee',
            //     'images' => 'hiasan-dinding.png',
            // ],

            // [
            //     'name' => 'Rak Meja',
            //     'price' => 85000,
            //     'cogs' => 85000,
            //     'stock' => '100',
            //     "category" => 'coffee',
            //     'images' => 'rak-meja.png',
            // ],

            // [
            //     'name' => 'Gelas Hias',
            //     'price' => 95000,
            //     'cogs' => 95000,
            //     'stock' => 100,
            //     "category" => 'coffee',
            //     'images' => 'gelas-hias.png',
            // ],
            // [
            //     'name' => 'Batu Hias',
            //     'price' => 105000,
            //     'cogs' => 105000,
            //     'stock' => 100,
            //     "category" => 'coffee',
            //     'images' => 'batu-hias.png',
            // ],

            // [
            //     'name' => 'Batu Hiasan',
            //     'price' => 115000,
            //     'cogs' => 115000,
            //     'stock' => 100,
            //     "category" => 'coffee',
            //     'images' => 'batu-hiasan.png',
            // ],

            // [
            //     'name' => 'Teko Keramik',
            //     'price' => 125000,
            //     'cogs' => 125000,
            //     'stock' => 100,
            //     "category" => 'coffee',
            //     'images' => 'teko-keramik.png',
            // ],

            // [
            //     'name' => "Dompet Kulit",
            //     'price' => 135000,
            //     'cogs' => 135000,
            //     "stock" => 100,
            //     "category" => 'coffee',
            //     'images' => "dompet-kulit.png",
            // ],

            // [
            //     "name" => "Sepatu Kulit",
            //     "price" => 145000,
            //     "cogs" => 145000,
            //     "stock" => 100,
            //     "category" => 'coffee',
            //     "images" => "sepatu-kulit.png",
            // ],

            // [
            //     "name" => "Lampu Hias",
            //     "price" => 155000,
            //     "cogs" => 155000,
            //     "stock" => 100,
            //     "category" => 'coffee',
            //     "images" => "lampu-hias.png",
            // ],

            // [
            //     "name" => "Miniatur Mobil",
            //     "price" => 165000,
            //     "cogs" => 165000,
            //     "stock" => 100,
            //     "category" => 'coffee',
            //     "images" => "miniatur-mobil.png",
            // ],

            // [
            //     "name" => "Miniatur Gajah",
            //     "price" => 175000,
            //     "cogs" => 175000,
            //     "stock" => 100,
            //     "category" => 'coffee',
            //     "images" => "miniatur-gajah.png",
            // ],
            ['name' => 'Kopi Susu', 'price' => 15000, 'cogs' => 12000, 'stock' => 100, 'category' => 'coffee'],
            ['name' => 'Kopi Hitam', 'price' => 13000, 'cogs' => 10000, 'stock' => 100, 'category' => 'coffee'],
            ['name' => 'Kopi Saring', 'price' => 13000, 'cogs' => 10000, 'stock' => 100, 'category' => 'coffee'],
            ['name' => 'Kopi Barbar', 'price' => 17000, 'cogs' => 14000, 'stock' => 100, 'category' => 'coffee'],
            ['name' => 'Kopi Kacang', 'price' => 17000, 'cogs' => 14000, 'stock' => 100, 'category' => 'coffee'],
            ['name' => 'Kopi Mawar', 'price' => 17000, 'cogs' => 14000, 'stock' => 100, 'category' => 'coffee'],
            ['name' => 'Kopi Kelapa', 'price' => 17000, 'cogs' => 14000, 'stock' => 100, 'category' => 'coffee'],
            ['name' => 'Kopi Gula Aren', 'price' => 17000, 'cogs' => 14000, 'stock' => 100, 'category' => 'coffee'],
            ['name' => 'Kopi Cocontol', 'price' => 17000, 'cogs' => 14000, 'stock' => 100, 'category' => 'coffee'],
            ['name' => 'Kopi Susu Coklat', 'price' => 15000, 'cogs' => 12000, 'stock' => 100, 'category' => 'coffee'],
            
            ['name' => 'Kopassus', 'price' => 10000, 'cogs' => 7000, 'stock' => 100, 'category' => 'traditional_coffee'],
            ['name' => 'Sukoco', 'price' => 10000, 'cogs' => 7000, 'stock' => 100, 'category' => 'traditional_coffee'],
            ['name' => 'Kopyok', 'price' => 10000, 'cogs' => 7000, 'stock' => 100, 'category' => 'traditional_coffee'],

            ['name' => 'Coklat Kelapa', 'price' => 13000, 'cogs' => 10000, 'stock' => 100, 'category' => 'non_coffee'],
            ['name' => 'Coklat Original', 'price' => 13000, 'cogs' => 10000, 'stock' => 100, 'category' => 'non_coffee'],
            ['name' => 'Coklat Kacang', 'price' => 13000, 'cogs' => 10000, 'stock' => 100, 'category' => 'non_coffee'],
            ['name' => 'Matcha', 'price' => 13000, 'cogs' => 10000, 'stock' => 100, 'category' => 'non_coffee'],
            ['name' => 'Red Velvet', 'price' => 13000, 'cogs' => 10000, 'stock' => 100, 'category' => 'non_coffee'],

            ['name' => 'Kentang', 'price' => 10000, 'cogs' => 7000, 'stock' => 100, 'category' => 'snack'],
            ['name' => 'Risol isi Ayam', 'price' => 12000, 'cogs' => 9000, 'stock' => 100, 'category' => 'snack'],
            ['name' => 'Risol isi Coklat', 'price' => 12000, 'cogs' => 90000, 'stock' => 100, 'category' => 'snack'],
            ['name' => 'Lumpia isi Ayam', 'price' => 12000, 'cogs' => 9000, 'stock' => 100, 'category' => 'snack'],
            ['name' => 'Pangsit Goreng', 'price' => 12000, 'cogs' => 9000, 'stock' => 100, 'category' => 'snack'],
            ['name' => 'Pumpuk', 'price' => 10000, 'cogs' => 7000, 'stock' => 100, 'category' => 'snack'],

            ['name' => 'Mie Goreng', 'price' => 8000, 'cogs' => 5000, 'stock' => 100, 'category' => 'heavy_meal'],
            ['name' => 'Mie Rebus', 'price' => 8000, 'cogs' => 5000, 'stock' => 100, 'category' => 'heavy_meal'],
            ['name' => 'Mie Goreng Telor', 'price' => 12000, 'cogs' => 9000, 'stock' => 100, 'category' => 'heavy_meal'],
            ['name' => 'Mie Rebus Telor', 'price' => 12000, 'cogs' => 9000, 'stock' => 100, 'category' => 'heavy_meal'],
            ['name' => 'Mie Gemladag', 'price' => 12000, 'cogs' => 9000, 'stock' => 100, 'category' => 'heavy_meal'],
        ]);
    }
}
