<?php
namespace App\Http\Interfaces\Api;

use Illuminate\Http\Request;



Interface CartInterface {
    public function addToCart(Request $request);
    public function userCart();
    public function delete($request);
}
