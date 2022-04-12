<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
        	[
                'name' => 'Kasimali',
                'email' => 'kasim@gmail.com',
                'password' => bcrypt('admin123'),
            ],
        	[
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
            ]
        ]);
    }
}
