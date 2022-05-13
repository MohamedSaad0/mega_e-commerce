<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Interfaces\Admin\OrderInterface;

class OrderController extends Controller
{
    protected $_OrderInterface;
    public function __construct(OrderInterface $OrderInterface){
        $this->_OrderInterface = $OrderInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->_OrderInterface->index();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return $this->_OrderInterface->edit($id);
    }

    public function update($request, $id) {
        return $this->_OrderInterface->update($request, $id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }
}
