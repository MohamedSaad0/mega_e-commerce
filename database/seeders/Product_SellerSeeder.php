<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Product_SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $seller_product =
            [
            ['product_id' => '1',
            'seller_id' => '1'
            ],
            ['product_id' => '2',
            'seller_id' => '1'
            ]
            ,['product_id' => '3',
            'seller_id' => '1'
            ]
            ,['product_id' => '4',
            'seller_id' => '2'
            ]
            ,['product_id' => '5',
            'seller_id' => '2'
            ]
            ,['product_id' => '6',
            'seller_id' => '3'
            ]
            ,['product_id' => '7',
            'seller_id' => '3'
            ]
            ,['product_id' => '8',
            'seller_id' => '4'
            ]
            ,['product_id' => '9',
            'seller_id' => '4'
            ]
    ];

    DB::table('product_seller')->insert($seller_product);

    }
}
