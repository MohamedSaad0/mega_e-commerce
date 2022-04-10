<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;





    public function category() {
        return $this->belongsToMany(Category::class,'category_product','category_id','product_id');
    }
    public function cart() {
        return $this->hasOne(Cart::class);
    }
}
