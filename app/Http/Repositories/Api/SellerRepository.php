<?php
namespace App\Http\Repositories\Api;

use App\Models\Seller;
use App\Models\Product;
use App\Http\Interfaces\Api\SellerInterface;

class SellerRepository implements SellerInterface {

    public function index() {
        $seller = Seller::all();

        if(count($seller)<=0) {

            return response()->json(["message" => "Error data not found"], 404);
        }
        if($seller) {
            return response()->json(["data" => $seller, "message" => "Success"]);
        }
    }

    public function seller_prod($id) {
        $seller = Seller::find($id);
        $seller_prod = Product::find($id);
        return $seller->product;
    }
}
