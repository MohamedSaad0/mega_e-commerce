<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            $users = [
                [
                'name' => 'Mahmoud',
                'email' => 'mahmoud.muhamed94@gmail.com',
                'password' => bcrypt('123456'),
                'address' => 'cairo',
                'phone' => 123456789,
                'role' => 'admin',

            ],
            [
                'name' => 'Mohamed',
                'email' => 'mohamedsaad17878@gmail.com',
                'password' => bcrypt('123456'),
                'address' => 'alex',
                'phone' => 123456789,
                'role' => 'admin',
            ]

        ]);
}
}
