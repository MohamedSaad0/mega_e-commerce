<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sellers =
        [
        ['name' => 'Seller 1',
        'description' => 'description'
        ],
        ['name' => 'Seller 2',
        'description' => 'description'
        ],['name' => 'Seller 3',
    '   description' => 'description'
        ],['name' => 'Seller 4',
        'description' => 'description'
        ]
];

DB::table('sellers')->insert($sellers);
}

}
