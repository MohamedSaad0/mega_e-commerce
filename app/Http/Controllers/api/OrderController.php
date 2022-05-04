<?php

namespace App\Http\Controllers\api;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order_Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Interfaces\Api\OrderInterface;

class OrderController extends Controller
{
    public $_OrderInterface;
    public function __construct(OrderInterface $OrderInterface) {

        return $this->_OrderInterface= $OrderInterface;
    }
    public function index() {

        return $this->_OrderInterface->index();
    }

    public function store(Request $request)
    {
        return $this->_OrderInterface->store($request);

    }
}
