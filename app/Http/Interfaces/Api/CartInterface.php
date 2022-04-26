<?php
namespace App\Http\Interfaces\Api;



Interface CartInterface {
    public function addToCart($request);
    public function update($request);
    public function userCart($id);
    public function delete($request);
}
