<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories = Category::all();
        return view("admin.category.show_all", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.category.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;

        $image = $request->file("image");
        $extension = $image->getClientOriginalExtension();
        $image_name = uniqid() . "." . $extension;
        $image->move(public_path("images/"), $image_name);

        $category->image = $image_name;
        $category->save();
        return redirect("/category/index")->with("success", "category created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, $id)
    {
        //
        $category = Category::find($id);
        return view("admin.category.show", compact("category"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $id)
    {
        //
        $category = Category::find($id);
        return view("admin.category.edit", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request)
    {
        $category = Category::find($request->id);

        if($category)
        {
            if(!empty($request->name)){
                $category->name = $request->name;
            }
            if(!empty($request->name)){
                $category->description = $request->description;
            }

            if($request->hasFile("image")){
                if($category->image){
                    unlink(public_path("images/") . $category->image);
                }
                $image = $request->file("image");
                $extension = $image->getClientOriginalExtension();
                $image_name = uniqid() . "." . $extension;
                $image->move(public_path("images/"), $image_name);
                $category->image = $image_name;
            }
            $category->image = $category->image;
            $category->save();
            return redirect("/category/index")->with("success", "category created successfully");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = Category::find($id);
        if($category->image){
            unlink(public_path("images/") . $category->image);
        }
        $category->delete();
        return redirect("/category/index")->with("danger", "category delete successfully");
    }
}
