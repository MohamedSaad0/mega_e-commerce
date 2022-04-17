<?php
namespace App\Http\Repositories\Api;

use App\Models\Product;
use App\Http\Interfaces\Api\ProductInterface;

class ProductRepository implements ProductInterface
{
    public function index() {
        return Product::all();
    }
    public function show($id) {

    }
    public function store($request) {

    }
    public function update($request, $id) {

    }
    public function destroy($id){

    }
}
