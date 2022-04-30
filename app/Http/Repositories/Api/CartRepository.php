<?php

namespace App\Http\Repositories\Api;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Cart_Product;
use Illuminate\Http\Request;
use App\Http\Resources\CartResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Interfaces\Api\CartInterface;

class CartRepository implements CartInterface
{

  public function addToCart($request)
  {
    $cart = Cart::where([['product_id', $request->product_id], ['user_id', Auth::user()->id]])->first();
    dd($cart);
    if ($cart) {
        $cart->update([
            'quantity' => $request->quantity
        ]);
    } else {
        $cart =  Cart::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => 500
        ]);
    }
    return response()->json(["data" => $cart, "Message" => "Updated successfull"]);
}


  public function userCart()
  {
      $cart = cartResource::collection(Cart::with('products:id,name,price,image,description')->where('user_id', Auth::user()->id)->select('product_id', 'quantity', 'id', 'total_price')->get());

    return response()->json(["data" => $cart, "Message" => "Success"]);
  }


  public function delete($request)
  {
    $cart = Cart::where([['user_id', Auth::user()->id] ,['product_id', $request->product_id]])->first();
    // dd($cart->product_id);
    if(is_null($cart)){
    return response()->json(["Message" => "Failed to delete"]);
    }
    $cart->delete();
    return response()->json(["Message" => "Deleted Successfully"]);
}
}
