<?php
namespace App\Http\Repositories\Admin;
use App\Models\Seller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Product_Seller;
use App\Http\Interfaces\Admin\ProductInterface;

class ProductRepository implements ProductInterface {

    public function index()
    {
        // $products = Product::all();
        $products = Product::with('seller:name,id')->get();
        // dd($products);
        return view('admin.product.show',["data" =>$products]);
    }

    public function create()
    {
        // $category = Category::all();

        $category = Category::all();
        $seller = Seller::all();
        return view('admin.product.create', compact('category','seller'));

    }

    public function store($request)
    {
        $product = new Product;
        if ($request->hasFile('image')) {
                $compliteFileName = $request->file('image')->getClientOriginalName();
                $filaNameOnly = pathinfo($compliteFileName, PATHINFO_FILENAME);
                $extension = $request->file('image')->getClientOriginalExtension();
                $comPic = str_replace(' ', '_', $filaNameOnly) . '-' . rand() . '_' . time() . '.' . $extension;
                $path = $request->file('image')->move(public_path("images/"), $comPic);
                $product->image = $comPic;
            }
            $product->category_id = $request->category_id;
            $product->name = $request->name;
            $product->description = $request->description;
            $product->price = $request->price;
            $product->quantity = $request->price;
            $product->discount = $request->discount;
            $product->save();

            $prod_seller = new Product_Seller();
            $prod_id=Product::latest()->first()->id;
            $prod_seller->product_id = $prod_id;
            $prod_seller->seller_id = $request->seller_id;
            $prod_seller->save();

            if ($prod_seller->save()) {
                return redirect()->route('product.index');
            } else {
                return ["error" => "Couldnt save product"];
            }

    }


    public function show($id)
    {
        //
        $product = Product::find($id);
        $category = Category::find($id);
        return view("admin.product.show_product", $product);
    }

    public function edit($id)
    {
        //
        $product = Product::find($id);
        return view("admin.product.edit", $product);
    }

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

    public function destroy($id)
    {

        $product = Product::find($id);
        if($product->image){
            unlink(public_path("images/") . $product->image);
        }
        Product::destroy($id);
        return redirect("/product/index ")->with("Product has been deleted");
    }
};
