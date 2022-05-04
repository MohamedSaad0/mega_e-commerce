<?php
namespace App\Http\Repositories\Api;

use App\Models\Product;
use App\Http\Interfaces\Api\CategoryInterface;

Class CategoryRepository implements CategoryInterface {

    public function relatedProducts($id)
    {
        $prod_cat = Product::where('category_id', $id)->get();

        // if(!$data->isEmpty())

        if(!$prod_cat->isEmpty()) {

            return response()->json(["Data" => $prod_cat, "Message" => "Success"]);
        }

        return response()->json(["Message" => "Category not found"]);
    }
}
