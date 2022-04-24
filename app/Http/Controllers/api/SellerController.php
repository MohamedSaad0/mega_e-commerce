<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Api\SellerInterface;

class SellerController extends Controller
{
    protected $_SellerInterface;
    public function __construct(SellerInterface $SellerInterface){

       $this->_SellerInterface = $SellerInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->_SellerInterface->index();
    }

    public function prod_seller($id) {
        return $this->_SellerInterface->prod_seller($id);
    }
}
