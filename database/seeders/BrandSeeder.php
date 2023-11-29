<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    public function run()
    {
        DB::table('brands')->delete();
        DB::table('brands')->truncate();
        DB::table('brands')->insert([
            ['brand_name'  => 'Apple', 'slug_brand' => 'apple', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'Asus', 'slug_brand' => 'asus', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'Logitech', 'slug_brand' => 'logitech', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'Razer', 'slug_brand' => 'razer', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'Newmen', 'slug_brand' => 'newmen', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'E-Dra', 'slug_brand' => 'e-dra', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'DareU', 'slug_brand' => 'dareu', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'Corsair', 'slug_brand' => 'corsair', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'FL-Esports', 'slug_brand' => 'fl-esports', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'CIDOO', 'slug_brand' => 'cidoo', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'Microsoft', 'slug_brand' => 'microsoft', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'Dell', 'slug_brand' => 'dell', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'Genius', 'slug_brand' => 'genius', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'Intel', 'slug_brand' => 'intel', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'AMD', 'slug_brand' => 'amd', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'Gigabyte', 'slug_brand' => 'gigabyte', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'MSI', 'slug_brand' => 'msi', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'ADATA', 'slug_brand' => 'adata', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'Kingmax', 'slug_brand' => 'kingmax', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'Corsair', 'slug_brand' => 'corsair', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'LEXAR', 'slug_brand' => 'lexar', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'Samsung', 'slug_brand' => 'samsung', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'SSTC', 'slug_brand' => 'sstc', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'WD', 'slug_brand' => 'wd', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'Kingston', 'slug_brand' => 'kingston', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'TEAMGROUP', 'slug_brand' => 'temgroup', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'Geil', 'slug_brand' => 'geli', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'G.Skill', 'slug_brand' => 'g-skill', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'Transcend', 'slug_brand' => 'transcend', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'Seagate', 'slug_brand' => 'seagate', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'Toshiba', 'slug_brand' => 'toshiba', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['brand_name'  => 'Quadro', 'slug_brand' => 'quadro', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
