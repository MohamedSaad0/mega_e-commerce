<?php
namespace App\Http\Interfaces\Admin;

Interface OrderInterface {
    public function index();
    public function edit($id);
    public function update($request, $id);
}
