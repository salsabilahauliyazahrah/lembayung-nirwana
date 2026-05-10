<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Brand::create([
            'nama_brand' => 'Nirwana Stay'
        ]);

        Brand::create([
            'nama_brand' => 'Lembayung Group'
        ]);

        Brand::create([
            'nama_brand' => 'Mountain Escape'
        ]);

        Brand::create([
            'nama_brand' => 'Valley Resort'
        ]);
    }
}
