<?php
namespace App\Http\Repositories\Api;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Order_Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Interfaces\Api\OrderInterface;

class OrderRepository implements OrderInterface {

    public function index() {

        $orders = Order_Product::with('orders:id,total_price,shipping_address,status', 'products:id,name,description,price')->whereHas('orders',function($query){
            $query->where('user_id',Auth()->user()->id);})->get();

        if(!$orders->isEmpty()){
            return response()->json(["data" => $orders,"message" => "Success"]);
        }
        return response()->json(["data" => [],"message" => "No available orders"]);
    }

    public function store($request)
    {
        $totalPrice = 0;
        $cart_items = Cart::where('user_id',Auth::user()->id)->with('products')->get();

        $totalPrice = $cart_items->sum(function ($item) {
            return $item->quantity * $item->products->price;
            });

        $order = Order::create([
            'user_id' => Auth::user()->id,
            'shipping_address' => $request->shipping_address,
            'status' => 'pending',
            'total_price' => $totalPrice
        ]);
        foreach($cart_items as $product) {
            $selectedProduct = Product::where('id', $product['product_id'])->first();
            $price = $selectedProduct->price;
            $count = $product->quantity;
            $total_cost = $price * $count;
            $order_product = Order_Product::create([
                'product_id' => $selectedProduct->id,
                'order_id' => $order->id,
                'product_quantity' => $count,
                'price' => $price,
                'total_price' => $total_cost
            ]);

            $product->delete();
        }

        return [Order::where('id', $order->id)->with('products')->first()];
}



}


