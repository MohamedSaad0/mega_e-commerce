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
        ['name' => 'men',
        'description' => 'description'
        ],
        ['name' => 'men',
        'description' => 'description'
        ],['name' => 'men',
    '   description' => 'description'
        ],['name' => 'men',
        'description' => 'description'
        ]
];

DB::table('sellers')->insert($sellers);
}

}
