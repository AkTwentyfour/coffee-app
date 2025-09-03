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
            ['name' => 'Kopi Susu', 'price' => 15000, 'cogs' => 12000, 'stock' => 100, 'comodity_category_id' => '1'],
            ['name' => 'Kopi Hitam', 'price' => 13000, 'cogs' => 10000, 'stock' => 100, 'comodity_category_id' => '1'],
            ['name' => 'Kopi Saring', 'price' => 13000, 'cogs' => 10000, 'stock' => 100, 'comodity_category_id' => '1'],
            ['name' => 'Kopi Barbar', 'price' => 17000, 'cogs' => 14000, 'stock' => 100, 'comodity_category_id' => '1'],
            ['name' => 'Kopi Kacang', 'price' => 17000, 'cogs' => 14000, 'stock' => 100, 'comodity_category_id' => '1'],
            ['name' => 'Kopi Mawar', 'price' => 17000, 'cogs' => 14000, 'stock' => 100, 'comodity_category_id' => '1'],
            ['name' => 'Kopi Kelapa', 'price' => 17000, 'cogs' => 14000, 'stock' => 100, 'comodity_category_id' => '1'],
            ['name' => 'Kopi Gula Aren', 'price' => 17000, 'cogs' => 14000, 'stock' => 100, 'comodity_category_id' => '1'],
            ['name' => 'Kopi Cocontol', 'price' => 17000, 'cogs' => 14000, 'stock' => 100, 'comodity_category_id' => '1'],
            ['name' => 'Kopi Susu Coklat', 'price' => 15000, 'cogs' => 12000, 'stock' => 100, 'comodity_category_id' => '1'],
            
            ['name' => 'Kopassus', 'price' => 10000, 'cogs' => 7000, 'stock' => 100, 'comodity_category_id' => '2'],
            ['name' => 'Sukoco', 'price' => 10000, 'cogs' => 7000, 'stock' => 100, 'comodity_category_id' => '2'],
            ['name' => 'Kopyok', 'price' => 10000, 'cogs' => 7000, 'stock' => 100, 'comodity_category_id' => '2'],

            ['name' => 'Coklat Kelapa', 'price' => 13000, 'cogs' => 10000, 'stock' => 100, 'comodity_category_id' => '3'],
            ['name' => 'Coklat Original', 'price' => 13000, 'cogs' => 10000, 'stock' => 100, 'comodity_category_id' => '3'],
            ['name' => 'Coklat Kacang', 'price' => 13000, 'cogs' => 10000, 'stock' => 100, 'comodity_category_id' => '3'],
            ['name' => 'Matcha', 'price' => 13000, 'cogs' => 10000, 'stock' => 100, 'comodity_category_id' => '3'],
            ['name' => 'Red Velvet', 'price' => 13000, 'cogs' => 10000, 'stock' => 100, 'comodity_category_id' => '3'],


            
            ['name' => 'Kentang', 'price' => 10000, 'cogs' => 7000, 'stock' => 100, 'comodity_category_id' => '4'],
            ['name' => 'Risol isi Ayam', 'price' => 12000, 'cogs' => 9000, 'stock' => 100, 'comodity_category_id' => '4'],
            ['name' => 'Risol isi Coklat', 'price' => 12000, 'cogs' => 90000, 'stock' => 100, 'comodity_category_id' => '4'],
            ['name' => 'Lumpia isi Ayam', 'price' => 12000, 'cogs' => 9000, 'stock' => 100, 'comodity_category_id' => '4'],
            ['name' => 'Pangsit Goreng', 'price' => 12000, 'cogs' => 9000, 'stock' => 100, 'comodity_category_id' => '4'],
            ['name' => 'Pumpuk', 'price' => 10000, 'cogs' => 7000, 'stock' => 100, 'comodity_category_id' => '4'],

            ['name' => 'Mie Goreng', 'price' => 8000, 'cogs' => 5000, 'stock' => 100, 'comodity_category_id' => '5'],
            ['name' => 'Mie Rebus', 'price' => 8000, 'cogs' => 5000, 'stock' => 100, 'comodity_category_id' => '5'],
            ['name' => 'Mie Goreng Telor', 'price' => 12000, 'cogs' => 9000, 'stock' => 100, 'comodity_category_id' => '5'],
            ['name' => 'Mie Rebus Telor', 'price' => 12000, 'cogs' => 9000, 'stock' => 100, 'comodity_category_id' => '5'],
            ['name' => 'Mie Gemladag', 'price' => 12000, 'cogs' => 9000, 'stock' => 100, 'comodity_category_id' => '5'],
        ]);
    }
}
