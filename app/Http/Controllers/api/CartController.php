<?php

namespace App\Http\Controllers\api;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Cart_Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request){

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
      public function update (Request $request){


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
      public function delete (Request $request){

          $cart = Cart::where([['user_id',Auth::user()->id],['product_id',$request->product_id]])->first();
              if(is_null($cart)){
                return response()->json(["Message" => "Cart not found"]);
            }
              $cart->delete();
              return response()->json(["Message" => "Deleted successfully"]);
      }
      public function userCart($id){
          $cart = Cart::with('products')->where('user_id', $id)->first();
          //   $cart= (Cart::with('product:id,name,price,image,description')->where('user_id',Auth::user()->id)->select('product_id','total_price','quantity')->get());
          //   return response()->json(["Data"=>"$cart","Message" => "Successs"]);
        }

    }
