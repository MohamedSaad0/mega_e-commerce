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
        //
        return view('admin.seller.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    //     $product = Product::find($id);
    //     $category = Category::find($id);
    //     return view("admin.product.show_product", $product);
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Product  $product
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    //     $product = Product::find($id);
    //     return view("admin.product.edit", $product);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Product  $product
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update($request, $id)
    // {
    //     $product = Product::find($id);
    //     $product->name = $request->name;
    //     $product->description = $request->description;
    //     $product->price = $request->price;
    //     $product->discount = $request->discount;
    //     $product->quantity = $request->quantity;
    //     $product->category = $request->category;
    //     $product->seller = $request->seller;
    //     if ($request->hasFile('image')) {
    //         $compliteFileName = $request->file('image')->getClientOriginalName();
    //         $filaNameOnly = pathinfo($compliteFileName, PATHINFO_FILENAME);
    //         $extension = $request->file('image')->getClientOriginalExtension();
    //         $comPic = str_replace(' ', '_', $filaNameOnly) . '-' . rand() . '_' . time() . '.' . $extension;
    //         // $path = $request->file('image')->storeAs('public/products', $comPic);
    //         $path = $request->file('image')->move(public_path("images/"), $comPic);
    //         $product->image = $comPic;
    //     }
    //     $product->save();
    //     return redirect()->route('product.index');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Product  $product
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //

    //     $product = Product::find($id);
    //     if($product->image){
    //         unlink(public_path("images/") . $product->image);
    //     }
    //     Product::destroy($id);
    //     return redirect("/product/index ")->with("Product has been deleted");
    // }
};
