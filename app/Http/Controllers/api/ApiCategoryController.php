<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiCategoryController extends Controller
{
    public function index()
    {
        // show all category
        $categories = Category::select("id", "name", "description", "image")->get();
        if(count($categories) > 0){
            return response()->json(["data" => $categories, "message" => "success", "status" => 200], 200);
        }
        return response()->json(["message" => "errors", "status" => 400], 400);
    }
    public function show($id)
    {
        // show one category
        $category = Category::select("id", "name", "description", "image")->where("id", $id)->get();

        if(count($category) > 0){
            return response()->json(["data" => $category, "message" => "success", "status" => 200], 200);
        }
        return response()->json(["message" => "errors", "status" => 400], 400);
    }
    // public function store(Request $request)
    // {
    //     // save one category
    //     $validator = Validator::make($request->all(), [
    //         "name" => "required|string|min:3|max:15",
    //         "description" => "required|string|min:10|max:100",
    //         "image" => "image|mimes:png,jpg",
    //     ]);
    //     if($validator->fails()){
    //         return response()->json($validator->errors(), 400);
    //     }

    //     $category = new Category();
    //     $category->name = $request->name;
    //     $category->description = $request->description;

    //     $image = $request->file("image");
    //     $extension = $image->getClientOriginalExtension();
    //     $image_name = uniqid() . "." . $extension;
    //     $image->move(public_path("images/"), $image_name);
    //     $category->image = $image_name;

    //     if($category->save())
    //     {
    //         return response()->json(["data" => $category, "message" => "success", "status" => 200], 200);
    //     }
    //     return response()->json(["message" => "errors", "status" => 400], 400);
    // }
    // public function update(Request $request, $id)
    // {
    //     // update one category
    //     $validator = Validator::make($request->all(), [
    //         "name" => "string|min:3|max:15",
    //         "description" => "string|min:10|max:100",
    //         "image" => "image|mimes:png,jpg",
    //     ]);
    //     if($validator->fails()){
    //         return response()->json($validator->errors(), 400);
    //     }

    //     $category = Category::find($id);

    //     if($category)
    //     {
    //         if(!empty($request->name)){
    //             $category->name = $request->name;
    //         }
    //         if(!empty($request->description)){
    //             $category->description = $request->description;
    //         }

    //         if($request->hasFile("image")){
    //             if($category->image){
    //                 unlink(public_path("images/") . $category->image);
    //             }
    //             $image = $request->file("image");
    //             $extension = $image->getClientOriginalExtension();
    //             $image_name = uniqid() . "." . $extension;
    //             $image->move(public_path("images/"), $image_name);
    //             $category->image = $image_name;
    //         }
    //         $category->image = $category->image;
    //         $category->save();
    //         return response()->json(["data" => $category, "message" => "success", "status" => 200], 200);
    //     }
    //     return response()->json(["message" => "errors", "status" => 400], 400);
    // }
    // public function destroy($id)
    // {
    //     // delete category
    //     $category = Category::find($id);
    //     if($category){
    //         if($category->image){
    //             unlink(public_path("images/") . $category->image);
    //         }
    //         $category->delete();
    //         return response()->json(["message" => "success", "status" => 200], 200);
    //     }
    //     return response()->json(["message" => "errors", "status" => 400], 400);
    // }
}
