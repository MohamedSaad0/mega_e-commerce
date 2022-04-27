<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    protected $fillable = [
        'name',
        'desciprtion',
        'image',
    ];
    use HasFactory;
    public function products() {
        return $this->belongsToMany(Product::class,'category_product','category_id','product_id');
    }
}
