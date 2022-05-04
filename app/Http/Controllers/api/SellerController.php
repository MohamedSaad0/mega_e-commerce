<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\Api\SellerInterface;

class SellerController extends Controller
{
    protected $SellerInterface;
    public function __construct(SellerInterface $SellerInterface){
        return $this->SellerInterface = $SellerInterface;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->SellerInterface->index();
    }

    public function seller_prod($id){
        return $this->SellerInterface->seller_prod($id);
    }
}
