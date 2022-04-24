<?php

namespace App\Http\Controllers\api;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Cart_Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Interfaces\Api\CartInterface;

class CartController extends Controller
{
    protected $CartInterface;
    public function __consruct(CartInterface $CartInterface) {
        $this->CartInterface = $CartInterface;
    }
    public function addToCart(Request $request){

        return $this->CartInterface->addToCart($request);
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
      public function userCart($id){
          $cart = Cart::with('products')->where('user_id', $id)->first();
          //   $cart= (Cart::with('product:id,name,price,image,description')->where('user_id',Auth::user()->id)->select('product_id','total_price','quantity')->get());
          //   return response()->json(["Data"=>"$cart","Message" => "Successs"]);
        }

        public function delete (Request $request){

            $cart = Cart::where([['user_id',Auth::user()->id],['product_id',$request->product_id]])->first();
                if(is_null($cart)){
                  return response()->json(["Message" => "Cart not found"]);
              }
                $cart->delete();
                return response()->json(["Message" => "Deleted successfully"]);
        }
    }
