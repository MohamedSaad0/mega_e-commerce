<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    public function product() {
        return $this->belongsToMany(Product::class,'category_product','category_id','product_id');
    }
}
