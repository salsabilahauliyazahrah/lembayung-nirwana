<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'nama_produk' => 'Cabin Riverside',
            'harga' => 1400000,
            'kapasitas' => 2,
            'category_id' => 1,
            'brand_id' => 1,
            'gambar_1' => 'Cabin1.1.jpg',
            'gambar_2' => 'Cabin1.2.jpg',            
        ]);

        Product::create([
            'nama_produk' => 'Cabin Mountain View',
            'harga' => 1800000,
            'kapasitas' => 6,
            'category_id' => 2,
            'brand_id' => 2,    
            'gambar_1' => 'Cabin2.1.jpg',
            'gambar_2' => 'Cabin2.2.jpg',

        ]);

        Product::create([
            'nama_produk' => 'Cabin Valley Retreat',
            'harga' => 2200000,
            'kapasitas' => 8,
            'category_id' => 3,
            'brand_id' => 3,
            'gambar_1' => 'Cabin3.1.jpg',
            'gambar_2' => 'Cabin3.2.jpg',                    
        ]);        

        Product::create([
            'nama_produk' => 'Cabin Luxury Escape',
            'harga' => 2200000,
            'kapasitas' => 8,
            'category_id' => 4,
            'brand_id' => 4,
            'gambar_1' => 'Cabin4.1.jpg',
            'gambar_2' => 'Cabin4.2.jpg',            
        ]);                
    }
}
