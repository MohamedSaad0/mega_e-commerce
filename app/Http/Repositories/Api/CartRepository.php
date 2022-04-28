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
      $product_count= 0;
    $cart = Cart::with('products')->where('user_id', Auth::user()->id)->first();
        $cart = Cart::create([
            'quantity' => 0,
            'user_id' => Auth::user()->id,
            'total_price' => $total_cost
        ]);
        // $cart->save();
        foreach($request->products as $product) {
            $selectedProduct = Product::where('id', $product['id'])->first();
            if ($selectedProduct) {
                $count = $product['quantity'];
                $product_count += $product['quantity'];
                $total_cost += (int)$selectedProduct['price'] * (int)$count;
                  }

                $cart->products()->attach($selectedProduct->id);
          }

          $cart->update([
            'quantity' => $product_count,
            'total_price' => $total_cost
        ]);
        $cart->save();


    // return Cart::where('id', $cart->id)->with('products')->first();

    return response()->json(["data" => $cart, "Message" => "Cart updated"]);

}


  public function update($request)
  {

        $cart = Cart::with('products')->where('user_id', Auth::user()->id)->first();
        $total_cost = $cart->total_price;
      $product_count= $cart->quantity;
      dd($cart['pivot']);
    if($cart){
        foreach($request->products as $product) {
            $selectedProduct = Product::where('id', $product['id'])->first();
            if ($product['id'] == $cart['pivot']['product_id']) {
                $count = $product['quantity'];
                $product_count += $product['quantity'];
                $total_cost += (int)$selectedProduct['price'] * (int)$count;
                  }

                $cart->products()->attach($selectedProduct->id);
          }
          $cart->update([
            'quantity' => $product_count + $cart->quantity,
            'total_price' => $total_cost
        ]);
    }
    // $cart = Cart::where([['user_id', Auth::user()->id], ['product_id', $request->product_id]])->first();
    // if ($cart) {
    //   $cart->update([
    //     'quantity' => $request->quantity,
    //     'total_price' => $request->total_price,
    //   ]);
      return response()->json(["data" => $cart, "Message" => "Updated successfull"]);
    // }
    // return response()->json(["Message" => "Cart not found"]);
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
