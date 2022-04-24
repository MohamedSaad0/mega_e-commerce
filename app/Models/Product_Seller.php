<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Seller extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'seller_id'
    ];

    public $table = 'product_seller';
}
