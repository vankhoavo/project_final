<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->delete();
        DB::table('admins')->truncate();
        DB::table('admins')->insert([
            'first_and_last_name'  => 'Võ Văn Khoa',
            'email' => 'vovankhoa2001@hotmail.com',
            'phone_number' => '0905955162',
            'password' => bcrypt('123456'),
            'date_of_birth' => '2001-05-04',
            'rule_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
