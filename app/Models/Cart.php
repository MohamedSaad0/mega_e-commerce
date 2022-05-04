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
        'quantity',
        'product_id'
    ];

    // public $table = 'Product_Seller';
    public function users(){
        return $this->belongsTo(User::class);
    }

    public function orders() {
        return $this->hasOne(Order::class);
    }
    public function products() {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
