<?php

namespace App\Http\Controllers\api;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function checkout($request)
    {
        $cartItems = Cart::where('user_id', auth()->user()->id)->with('products')->get();
        if( is_null($cartItems) ){
            return response->json(["Message"=> "cart is empty"]);

        }

        $totalPrice = 0;

        $totalPrice = $cartItems->sum(function ($item) {
            return $item->count * $item->products->price;
        });

        DB::transaction(function () use ($totalPrice, $cartItems,$request) {
            $order = Order::create([
                'user_id' => Auth::user()->id,
                'delivery_fee'=>35,
                'totalprice' => $totalPrice
            ]);
            foreach ($cartItems as $cartItem) {
            Orderitem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->products->id,
                    'count' => $cartItem->count,
                    'unit_price' => $cartItem->products->price,
                    'net_price' => ($cartItem->count * $cartItem->products->price) ,
                    'address'=> $request->address,
                    'phone'=> $request->phone
                ]);
            $product = Product::find($cartItem->products->id);
            $product->update(['stock' => $product->stock - $cartItem->count]);
            $cartItem->delete();
            }

        });
}
}
