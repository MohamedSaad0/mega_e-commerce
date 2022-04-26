<?php
namespace App\Http\Repositories\Api;

use App\Models\Product;
use App\Http\Interfaces\Api\ProductInterface;
use Illuminate\Support\Facades\Auth;

class ProductRepository implements ProductInterface{

    public function index() {
        return Product::all();
    }
    public function show($id) {
        $product = Product::find($id);
        return response()->json($product,201);
    }
}
