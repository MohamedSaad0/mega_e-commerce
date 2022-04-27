<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
        $categories = [
            [
                'name' => 'men',
                'description' => 'descriptionHOHO',
                'image' => 'image.png'
            ],
            [
                'name' => 'women',
                'description' => 'descriptionHOHO',
                'image' => 'image.png'
            ],
            [
                'name' => 'kids',
                'description' => 'descriptionHOHO',
                'image' => 'image.png'
            ],
            [
                'name' => 'jeans',
                'description' => 'descriptionHOHO',
                'image' => 'image.png'
            ],
            [
                'name' => 'dress',
                'description' => 'descriptionHOHO',
                'image' => 'image.png'
            ]

        ]);


    }
}
