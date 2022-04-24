<?php

namespace App\Models;

use App\Models\Cart;
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

    public function category() {
       
        return $this->belongsTo(Category::class,'category_id');
    }
    public function cart() {
        return $this->hasOne(Cart::class);
    }

    public function seller() {
        return $this->belongsToMany(Seller::class);
    }
}
