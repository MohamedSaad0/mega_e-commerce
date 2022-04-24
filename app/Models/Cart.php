<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'total_price',
    ];

    // public $table = 'Product_Seller';
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function order() {
        return $this->hasOne(Order::class);
    }
    public function product() {
        return $this->belongsToMany(Product::class);
    }
}
