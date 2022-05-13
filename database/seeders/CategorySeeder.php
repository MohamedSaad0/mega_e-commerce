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
                'image' => 'https://theupcoming-flmedialtd.netdna-ssl.com/wp-content/uploads/2018/11/pexels-photo-842811-1024x620.jpeg'
            ],
            [
                'name' => 'women',
                'description' => 'descriptionHOHO',
                'image' => 'https://i.pinimg.com/originals/6f/87/4b/6f874bf5887f01caab908ed0d4bdc110.jpg'
            ],
            [
                'name' => 'kids',
                'description' => 'descriptionHOHO',
                'image' => 'https://images.indianexpress.com/2019/10/girl-fashion.jpg'
            ],
            [
                'name' => 'jeans',
                'description' => 'descriptionHOHO',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTZKEE8ZU5M7CS412HkLfksPqcYGPyVSUnwuQ&usqp=CAU'
            ],
            [
                'name' => 'dress',
                'description' => 'descriptionHOHO',
                'image' => 'https://lcw.akinoncdn.com/products/2021/12/29/2974125/2025a53d-fd8f-4f5f-9921-9a3041fb0220_size561x730.jpg'
            ]
        ]);
    }
}
