<?php
namespace App\Http\Repositories\Admin;
use App\Models\Seller;
use App\Models\Product;
use App\Models\Category;
use App\Http\Interfaces\Admin\SellerInterface;

class SellerRepository implements SellerInterface {

    public function index()
    {
        $products = Product::all();
        $seller = Seller::all();
        return view('admin.seller.show',["data" =>$seller]);
    }

    public function create()
    {
        
        return view('admin.seller.create');
    }

    public function store($request)
    {
        $seller = new Seller;
        $seller->name = $request->name;
        $seller->description = $request->description;
        $seller->save();

        if ($seller->save()) {
            return redirect()->route('seller.index');
        } else {
            return ["error" => "Couldnt save seller"];
        }
    }

    public function show($id)
    {
        //
        $seller = Seller::find($id);
        $category = Category::find($id);
        return view("admin.seller.show_seller", $seller);
    }

    public function edit($id)
    {
        //
        $seller = Seller::find($id);
        return view("admin.seller.edit", $seller);
    }

    public function update($request, $id)
    {
        $seller = Seller::find($id);
        $seller->name = $request->name;
        $seller->description = $request->description;

        $seller->save();
        return redirect()->route('seller.index');
    }

    public function destroy($id)
    {

        Seller::destroy($id);
        return redirect("/seller/index")->with("Product has been deleted");
    }
};
