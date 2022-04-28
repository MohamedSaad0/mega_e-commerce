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
      $q = $request->quantity;
    //   $price = new CartResource(Cart::with('products:price,id')->where('id', $request->id)->get());
      $price =  CartResource::collection(Cart::all());
      dd($price);
      $cart = Cart::where('user_id', Auth::user()->id)->first();
      if($cart) {
          $cart->update([
              'quantity' => $request->quantity,
              'total_price' => 50
          ]);
          return response($cart);
      }else{

          $x=new Cart();
          $x->user_id=Auth::user()->id;
          $x->quantity=$request->quantity;
          $x->total_price=23;
          $x->save();
          $cart = Cart::where('user_id', Auth::user()->id)->first();

          // dd($cart);
          $y=new Cart_Product();
          $y->cart_id=$cart->id;
          $y->product_id = $request->product_id;
          $y->save();
          return 'created';

        }

    //   $total_cost = 0;
    //   $product_count= 0;
    //   $product = $request->product_id;
    //   $cart = Cart::with('products')->where('user_id', Auth::user()->id)->first();

    //    //   if($selectedProduct) {
    //        $count = $request['quantity'];
    //        $product_count += $request['quantity'];
    //        $total_cost += (int)$cart->products->price * (int)$count;
    //     //   }
    //   if($cart){
    //     $selectedProduct = Product::where('id', $request->product_id)->first();

    //     // foreach($request->products as $product) {
    //     //     $selectedProduct = Product::where('id', $product['id'])->first();
    //     //     if($selectedProduct) {
    //     //         $count = $product['quantity'];
    //     //         $product_count += $product['quantity'];
    //     //         $total_cost += (int)$selectedProduct['price'] * (int)$count;
    //     //           }
    //     //         $cart->products()->attach($selectedProduct->id);
    //     //   }
    //     // dd($selectedProduct);

    //               $cart->update([
    //                 //'user_id' => Auth::user()->id,
    //                   'quantity' => $product_count,
    //                   'total_price' => $total_cost,
    //                 ]);
    //                 return response()->json(["data" => $cart, "Message" => "Cart updated"]);

    //             }else {
    //                 $cart = Cart::create([
    //                     'user_id' => Auth::user()->id,
    //                     'quantity' => $product_count,
    //                     'total_price' => $total_cost
    //                 ]);
    //                 $cart->products()->attach($selectedProduct->id);
    //   }

    //     $cart->save();
    // return response()->json(["data" => $cart, "Message" => "Cart created"]);

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
