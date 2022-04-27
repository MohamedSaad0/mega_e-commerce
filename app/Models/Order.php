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
    public function users() {
        return $this->hasOne(User::class);
    }

    public function carts(){
        return $this->belongsTo(Cart::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class);
    }

}
