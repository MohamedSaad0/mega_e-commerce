<?php

namespace App\Models;

use App\Models\Product;
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
    public function product() {
        return $this->belongsToMany(Product::class);
    }


}
