<?php
namespace App\Http\Interfaces\Api;

Interface SellerInterface
{
    public function index();
    public function seller_prod($id);
}
