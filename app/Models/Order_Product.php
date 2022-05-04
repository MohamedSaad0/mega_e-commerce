<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order_Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'product_id',
        'product_quantity',
        'price',
        'total_price'
    ];

    protected $table = 'order_product';

    public function orders() {
        return $this->belongsTo(Order::class,'order_id','id');
    }

    public function products() {
        return $this->belongsTo(Product::class, 'product_id','id');
    }
}
