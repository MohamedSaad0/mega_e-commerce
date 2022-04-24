<?php
namespace App\Http\Repositories\Api;

use App\Models\Seller;
use App\Http\Interfaces\Api\SellerInterface;

class SellerRepository implements SellerInterface {
    public function index() {
        $sellers = Seller::all();
        if($sellers) {
            return response()->json(["Data" => $sellers, "Message" => "Success"]);
        }
    }
    public function prod_seller($id){
        $products = Seller::where('id', $id)->with('products:id,name,description')->get();
        // return $products;
        dd($products);
    }
}
