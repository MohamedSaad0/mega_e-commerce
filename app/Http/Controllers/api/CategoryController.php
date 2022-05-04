<?php

namespace App\Http\Controllers\api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Api\CategoryInterface;

class CategoryController extends Controller
{
    public $_CategoryInterface;
    public function __construct(CategoryInterface $categoryInterface){

        $this->_Category_product = $categoryInterface;
    }
    public function relatedProducts($id)
    {
        return $this->_Category_product->relatedProducts($id);
    }
}
