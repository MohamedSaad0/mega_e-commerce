<?php
namespace App\Http\Repositories\Api;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Interfaces\Api\CartInterface;

class CartRepository implements CartInterface {

    public function addToCart($request){

        $cart= Cart::where([['product_id',$request->product_id],['user_id',Auth::user()->id]])->first();
        if($cart){
                $cart->update([
                    'quantity'=>$request->quantity,
                    'total_price'=>$request->total_price,
                ]);
                }else{
                    $cart = new Cart();
                    $cart->user_id = Auth::user()->id;
                    $cart->product_id = $request->product_id;
                    $cart->quantity = $request->quantity;
                    $cart->total_price = $request->total_price;
                    $cart->save();

                    //Third table
                    $cart_prod = new Cart_Product();
                    $cart_prod->product_id= $request->product_id;
                    $cart_prod->cart_id= $request->cart_id;
                    $cart_prod->save();
        }

        return response()->json(["data"=>$cart, "Message" => "added to cart"]);
      }

      public function update ($request){

        $cart = Cart::where([['user_id',Auth::user()->id],['product_id',$request->product_id]])->first();
        if($cart){
            $cart->update([
              'quantity'=>$request->quantity,
              'total_price'=>$request->total_price,
            ]);
        return response()->json(["data"=>$cart, "Message" => "Updated successfull"]);

        }
        return response()->json(["Message" => "Cart not found"]);
    }

    public function userCart($id){
        $cart = Cart::with('products')->where('user_id', $id)->first();
      }

      public function delete($request){

        $cart = Cart::where([['user_id',Auth::user()->id],['product_id',$request->product_id]])->first();
            if(is_null($cart)){
              return response()->json(["Message" => "Cart not found"]);
          }
            $cart->delete();
            return response()->json(["Message" => "Deleted successfully"]);
    }
}
