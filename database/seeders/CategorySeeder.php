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
        $categories = [
            ['name' => 'men',
            'description ' => 'description',
            'image' => 'image.png'],
            ['name' => 'women', 'description ' => 'description',
            'image' => 'image.png'],
            ['name' => 'kids', 'description ' => 'description',
            'image' => 'image.png'],
            ['name' => 'jeans', 'description ' => 'description',
            'image' => 'image.png'],
            ['name' => 'dress', 'description ' => 'description',
            'image' => 'image.png'],

        ];

        DB::table('categories')->insert($categories);
    }
}
