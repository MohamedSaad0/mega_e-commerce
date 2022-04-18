<?php
namespace App\Http\Interfaces\Admin;

Interface SellerInterface {
    public function index();
    public function create();
    public function store($request);
}
