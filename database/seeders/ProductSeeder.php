<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            $products = [
                ['name' => 'jacket',
                'description' =>Str::random(10),
                'price' => 100,
                'image' => 'feature_prod_01.jpg',
                'discount' => 10,
                'category_id' => 1,
                'quantity' => 50
            ],
                ['name' => 't-shirt',
                'image' => 'feature_prod_01.jpg',
                'description' => 'feature_prod_01.jpg',
                'price' => 120,
                'discount' => 15,
                'category_id' => 2,
                'quantity' => 50
            ],
                ['name' => 'hat',
                'image' => 'feature_prod_01.jpg',
                'description' =>Str::random(10),
                'price' => 100,
                'discount' => 20,
                'category_id' => 3,
                'quantity' => 50
            ],
                ['name' => 'trendi',
                'image' => 'feature_prod_02.jpg',
                'description' =>Str::random(10),
                'price' => 150,
                'discount' => 50,
                'category_id' => 4,
                'quantity' => 50
            ],
                ['name' => 'elegent',
                'image' =>'feature_prod_02.jpg',
                'description' =>Str::random(10),
                'price' => 200,
                'discount' => 10,
                'category_id' => 5,
                'quantity' => 50

            ],
                ['name' => 'cool',
                'image' => 'feature_prod_03.jpg',
                'description' =>Str::random(10),
                'price' => 100,
                'discount' => 30,
                'category_id' => 2,
                'quantity' => 50
            ],
                ['name' => 'funky',
                'image' => 'feature_prod_03.jpg',
                'description' =>Str::random(10),
                'price' => 300,
                'discount' => 30,
                'category_id' => 1,
                'quantity' => 50
            ],
                ['name' => 'trade',
                'image' => 'feature_prod_03.jpg',
                'description' =>Str::random(10),
                'price' => 300,
                'discount' => 30,
                'category_id' => 4,
                'quantity' => 50

            ],
                ['name' => 'sport',
                'image' => 'feature_prod_03.jpg',
                'description' =>Str::random(10),
                'price' => 300,
                'discount' => 30,
                'category_id' => 5,
                'quantity' => 50

            ],
                ['name' => 'casual',
                'image' => 'feature_prod_03.jpg',
                'description' =>Str::random(10),
                'price' => 300,
                'discount' => 30,
                'category_id' => 1,
                'quantity' => 50
            ],
            ];

            DB::table('products')->insert($products);
    }
}
