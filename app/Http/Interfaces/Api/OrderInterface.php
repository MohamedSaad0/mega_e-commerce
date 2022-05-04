<?php
namespace App\Http\Interfaces\Api;

Interface OrderInterface {
    public function index();
    public function store($request);
}
