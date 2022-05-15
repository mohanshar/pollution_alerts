<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->truncate();
        $data= [
            'name' => 'admin',
            // 'username' => 'admin',
            'email' => 'mohan@gmail.com',
            'password' => bcrypt('mohan'),
        ];

        DB::table('admins')->insert($data);
    }
}
