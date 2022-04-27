<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_Product extends Model
{
    use HasFactory;
    protected $fillabe = [
        'product_id',
    ];

    public $table = 'Cart_Product';
}
