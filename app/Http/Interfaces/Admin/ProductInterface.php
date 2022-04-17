<?php
namespace App\Http\Interfaces\Admin;

interface ProductInterface {
    public function index();
    public function create();
    public function show($id);
    public function store($request);
    public function edit($id);
    public function update($request, $id);
    public function destroy($id);
}
