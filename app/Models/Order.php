<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    public function user() {
        return $this->hasOne(User::class);
    }

    public function cart(){
        return $this->belongsTo(Cart::class);
    }

    public function product() {
        return $this->belongsToMany(Product::class);
    }

}
