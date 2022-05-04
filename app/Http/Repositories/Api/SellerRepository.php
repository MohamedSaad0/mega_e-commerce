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
        $products = Seller::where('id', $id)->with('products')->get();
        if(!$products->isEmpty()){

            return response()->json(["Data" => $products, "Message" => "Success"]);
        }
        return response()->json(["Message" => "Error invalid seller"]);
    }
}
