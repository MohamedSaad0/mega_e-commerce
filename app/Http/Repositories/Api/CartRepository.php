<?php

namespace App\Http\Repositories\Api;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Interfaces\Api\CartInterface;

class CartRepository implements CartInterface
{

  public function addToCart($request)
  {
    $total_cost = 0;
    $cart = Cart::where([['user_id', Auth::user()->id]])->first();

    if ($cart) {
        foreach ((array)$request->products as $product) {
            $selectedProduct = Product::where('id', $product['id'])->first();
            if ($selectedProduct) {
                $count = $request->quantity;
                $total_cost += $selectedProduct->price * $count;
                $cart->quantity = $request->quantity;
                $cart->products()->attach($selectedProduct->id);
            }
        }
        $cart->update([
            'quantity' => $request->quantity,
            'total_price' => $total_cost
        ]);
        return response()->json(["data" => $cart, "Message" => "Cart updated"]);


    } else {
      $cart = new Cart();
      $cart->user_id = Auth::user()->id;
      $cart->quantity = $request->quantity;

      foreach((array)$request->products as $product) {
          $selectedProduct = Product::where('id', $product['id'])->first();
          if ($selectedProduct) {
              $count = $request->quantity;
              $total_cost += $selectedProduct->price * $count;
                }
              $cart->products()->attach($selectedProduct->id);
        }
        $cart->total_price = $total_cost;
        $cart->save();

    // return Cart::where('id', $cart->id)->with('products')->first();

    return response()->json(["data" => $cart, "Message" => "added to cart"]);
  }
}

  public function update($request)
  {
    $cart = Cart::where([['user_id', Auth::user()->id], ['product_id', $request->product_id]])->first();
    if ($cart) {
      $cart->update([
        'quantity' => $request->quantity,
        'total_price' => $request->total_price,
      ]);
      return response()->json(["data" => $cart, "Message" => "Updated successfull"]);
    }
    return response()->json(["Message" => "Cart not found"]);
  }

  public function userCart()
  {
    $cart = Cart::with('products')->where('user_id', Auth::user()->id)->get();
    return response()->json(["data" => $cart, "Message" => "Success"]);
  }

  public function destroy($request)
  {
    // $cart = Cart::where([['user_id', Auth::user()->id], ['product_id', $request->product_id]])->get();
    // if (is_null($cart)) {
    //   return response()->json(["Message" => "Cart not found"]);
    // }
    // $cart->destroy();
    // return response()->json(["Message" => "Deleted successfully"]);
     $cart=  Cart::where('user_id', Auth::user()->id)->delete();
    //  if(is_null($cart)){
    //     return response()->json(["Message" => "Cart not found"]);
    //  }
    //      $cart->destroy();
        return response()->json(["Message" => "Deleted Successfully"]);

}
}
