<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(ProductTypeSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(AdminSeeder::class);
    }
}
