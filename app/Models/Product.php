<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Seller;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'image',
        'discount',
        'category_id',
    ];

    public function categories() {
        return $this->belongsTo(Category::class,'category_id', 'id');
    }

    public function sellers() {
        return $this->belongsToMany(Seller::class);
    }

    public function orders(){
        return $this->belongsToMany(Order::class);
    }
}
