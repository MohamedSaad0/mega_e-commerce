<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Product_Seller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];
    public $table = 'sellers';
    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
