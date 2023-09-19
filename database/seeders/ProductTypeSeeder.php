<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTypeSeeder extends Seeder
{
    public function run()
    {
        // Xoá toàn bộ dữ liệu ở table
        DB::table('product_types')->delete();
        // Muốn làm sạch lại CSDL lại từ đầu
        DB::table('product_types')->truncate();
        // Tạo database
        DB::table('product_types')->insert([
            ['product_type_name' => 'Keyboard', 'slug_product_type_name' => 'keyboard', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['product_type_name' => 'Computer mouse', 'slug_product_type_name' => 'computer-mouse', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['product_type_name' => 'RAM', 'slug_product_type_name' => 'ram', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['product_type_name' => 'ROM', 'slug_product_type_name' => 'rom', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['product_type_name' => 'Graphics card', 'slug_product_type_name' => 'graphics-card', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['product_type_name' => 'Hard drive', 'slug_product_type_name' => 'hard-drive', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['product_type_name' => 'Computer screen', 'slug_product_type_name' => 'computer-screen', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['product_type_name' => 'Mainboard', 'slug_product_type_name' => 'mainboard', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
