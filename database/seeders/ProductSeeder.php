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
                ['name' => 'Nike Air',
                'description' =>Str::random(10),
                'price' => 100,
                'image' => 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/cceef956-48a3-49c7-adaa-1e8769c636eb/air-max-excee-shoe-st8Vwj.png',
                'discount' => 10,
                'category_id' => 1,
                'quantity' => 50,
            ],
                ['name' => 'New Balance Comfortable',
                'image' => 'https://nb.scene7.com/is/image/NB/ms327ea_nb_02_i?$pdpflexf2$&wid=440&hei=440',
                'description' => 'feature_prod_01.jpg',
                'price' => 120,
                'discount' => 15,
                'category_id' => 2,
                'quantity' => 50
            ],
                ['name' => 'Plain White t-shirt',
                'image' => 'https://cf.shopee.ph/file/080d654dbfe818e130333d98dde2420d',
                'description' =>Str::random(10),
                'price' => 100,
                'discount' => 20,
                'category_id' => 3,
                'quantity' => 50
            ],
                ['name' => 'Casual Hat',
                'image' => 'https://m.media-amazon.com/images/I/81bBIDU8BVL._AC_UL1500_.jpg',
                'description' =>Str::random(10),
                'price' => 150,
                'discount' => 50,
                'category_id' => 4,
                'quantity' => 50
            ],
                ['name' => 'Rounded Summer Hat',
                'image' =>'https://img.hatshopping.com/Manuel-Fedora-Hat-by-Mayser.44100_8.jpg',
                'description' =>Str::random(10),
                'price' => 200,
                'discount' => 10,
                'category_id' => 5,
                'quantity' => 50

            ],
                ['name' => 'Ice cap',
                'image' => 'https://apollo-ireland.akamaized.net/v1/files/6iy7g8luug6w-EG/image;s=644x461;olx-st/_1_.jpg',
                'description' =>Str::random(10),
                'price' => 100,
                'discount' => 30,
                'category_id' => 2,
                'quantity' => 50
            ],
                ['name' => 'Jeans Pants',
                'image' => 'https://redbridgejeans.de/media/image/product/65946/lg/m4253_red-bridge-mens-jeans-pants-slim-fit-denim-stonewashed-arena-b-m4253.jpg',
                'description' =>Str::random(10),
                'price' => 300,
                'discount' => 30,
                'category_id' => 1,
                'quantity' => 50
            ],
                ['name' => 'Sun glasses',
                'image' => 'https://cdn.shopify.com/s/files/1/0084/1616/5946/products/AGingersSoul_3Q_grande.jpg?v=1588805484',
                'description' =>Str::random(10),
                'price' => 300,
                'discount' => 30,
                'category_id' => 4,
                'quantity' => 50

            ],
                ['name' => 'Suit',
                'image' => 'https://static.theblacktux.com/products/suits/black-suit/1_161129_TBT_Ecom_Black_Suit_1_1587_w1_1812x1875.jpg',
                'description' =>Str::random(10),
                'price' => 300,
                'discount' => 30,
                'category_id' => 5,
                'quantity' => 50

            ],
                ['name' => 'Men Shirt',
                'image' => 'https://assets.ajio.com/medias/sys_master/root/20210403/ywxs/60686961f997dd7b645dbf0c/-473Wx593H-461119026-black-MODEL.jpg',
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
