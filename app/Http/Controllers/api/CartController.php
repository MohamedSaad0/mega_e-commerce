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
    protected $_CartInterface;
    public function __construct(CartInterface $CartInterface) {
        $this->_CartInterface = $CartInterface;
    }
    public function addToCart(Request $request){

        return $this->_CartInterface->addToCart($request);
      }

      public function update (Request $request){

        return $this->_CartInterface->update($request);
      }
      public function userCart(){
        return $this->_CartInterface->userCart();
        }
        public function delete (Request $request){
        return $this->_CartInterface->delete($request);
        }
    }
