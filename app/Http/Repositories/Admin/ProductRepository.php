<?php
namespace App\Http\Repositories\Admin;
use App\Models\Product;
use App\Http\Interfaces\Admin\ProductInterface;

class ProductRepository implements ProductInterface {

    public function index()
    {
        //
        $products = Product::all();
        return view('admin.product.show',["data" =>$products]);
    }

    public function create()
    {
        //
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($request)
    {

        $product = new Product;
        if ($request->hasFile('image')) {
            // if($product->image){
            //     unlink(public_path("images/") . $product->image);
            // }
            $compliteFileName = $request->file('image')->getClientOriginalName();
            $filaNameOnly = pathinfo($compliteFileName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $comPic = str_replace(' ', '_', $filaNameOnly) . '-' . rand() . '_' . time() . '.' . $extension;
            // $path = $request->file('image')->storeAs('public/products', $comPic);
            $path = $request->file('image')->move(public_path("images/"), $comPic);
            $product->image = $comPic;
        }
        $category = $request->category;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->price;
        $product->discount = $request->discount;
        $product->category = $request->category;
        $product->seller = $request->seller;
        $product->save();

        if ($product->save()) {
            return redirect()->route('product.index');
        } else {
            return ["error" => "Couldnt save product"];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::find($id);
        return view("admin.product.show_product", $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::find($id);
        return view("admin.product.edit", $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update($request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $product->seller = $request->seller;
        if ($request->hasFile('image')) {
            $compliteFileName = $request->file('image')->getClientOriginalName();
            $filaNameOnly = pathinfo($compliteFileName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $comPic = str_replace(' ', '_', $filaNameOnly) . '-' . rand() . '_' . time() . '.' . $extension;
            // $path = $request->file('image')->storeAs('public/products', $comPic);
            $path = $request->file('image')->move(public_path("images/"), $comPic);
            $product->image = $comPic;
        }
        $product->save();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $product = Product::find($id);
        if($product->image){
            unlink(public_path("images/") . $product->image);
        }
        Product::destroy($id);
        return redirect("/product/index ")->with("Product has been deleted");
    }
};
