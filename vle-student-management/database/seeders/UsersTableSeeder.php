<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'u_id'=>'u001',
            'name' => 'chamika',
            'email' => 'chamika@gmail.com',
            'password' => Hash::make('123'),
            'c_id'=>'c001'
        ]);
    }
}
