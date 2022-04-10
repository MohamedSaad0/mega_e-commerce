<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    public function order() {
        return $this->hasOne(Order::class);
    }

    public function cart(){
        return $this->belongsTo(Cart::class);
    }
}
