<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart_Product extends Model
{
    use HasFactory;
    protected $fillabe = [
        'product_id',
        'cart_id'
    ];

    public $table = 'Cart_Product';

    // public function product() {
    //     return $this->belongsToMany(product::class);
    // }
}
