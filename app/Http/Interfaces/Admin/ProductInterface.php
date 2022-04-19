<?php
namespace App\Http\Interfaces\Admin;

Interface ProductInterface {
    public function index();
    public function create();
    public function show($id);
    public function store($request);
    public function edit($id);
    public function update($request, $id);
    public function destroy($id);
}
