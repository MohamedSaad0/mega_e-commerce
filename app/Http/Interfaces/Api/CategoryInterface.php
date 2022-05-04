<?php
namespace App\Http\Interfaces\Api;

use Illuminate\Http\Request;



Interface CategoryInterface {
    public function relatedProducts($id);
}
