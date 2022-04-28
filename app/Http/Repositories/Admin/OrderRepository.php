<?php
namespace App\Http\Repositories\Admin;

use App\Models\Order;
use App\Http\Interfaces\Admin\OrderInterface;

class OrderRepository implements OrderInterface {
    public function index() {
        $orders = Order::all();
        return view('admin.order.show', compact('orders'));
    }

}
