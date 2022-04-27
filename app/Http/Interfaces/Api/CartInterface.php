<?php
namespace App\Http\Interfaces\Api;



Interface CartInterface {
    public function addToCart($request);
    public function update($request);
    public function userCart();
    public function delete($request);
}
