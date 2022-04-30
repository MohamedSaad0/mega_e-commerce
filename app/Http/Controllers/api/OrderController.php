<?php

namespace App\Http\Controllers\api;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'shipping_address' => $request->shipping_address,
            'status' => 'pending',
            'cart_id' => $request->cart_id
        ]);


        foreach((array)$request->products as $product) {
            $selectedProduct = Product::where('id', $product['id'])->first();
            if ($selectedProduct) {
                $count = $request->quantity;
                $total_cost += $selectedProduct->price * $count;
            }
            $order->products()->attach($selectedProduct->id);
        }

        $order->update([
            'total_cost' => $total_cost
        ]);

        $order->save();
        return [Order::where('id', $order->id)->with('products')->first()];

}
}
