<?php
namespace App\Http\Repositories\Admin;

use App\Models\Order;
use App\Models\Order_Product;
use Illuminate\Support\Facades\Auth;
use App\Http\Interfaces\Admin\OrderInterface;

class OrderRepository implements OrderInterface {
    public function index() {
        $orders = Order::with('users')->get();
        return view('admin.order.show', compact('orders'));
    }

    public function edit($id){
        $orders = Order::find($id);
        // dd($orders);
        return view('admin.order.edit',compact('orders'));
    }

    public function update($request, $id){
        $order = Order::find($id);
        // $order = Order::update([
        //     'status' => $request->status
        // ]);

        $order = new Order;
        $order->status=$request->status;
        $order->save();
        return "Bruh";
        return redirect()->route('order.index');
    }

}
