<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\ProductController;
class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "image" => "image|mimes:png,jpg",
            "name" => "required|string|min:5|max:20",
            "description" => "required|string|min:15|max:50",
            "price" => "required|string",
            "quantity" => "required|string",
            "discount" => "required|string",
            "category" => "required|string",
            "seller" => "required|string",
        ];
    }
    public function message(){
        $message = array(
        'image.required' => 'Image is required',
        'name.required' => 'name is required',
        'name.string' => 'Invalid name',
        'description.required' => 'description is required',
        'description.string' => 'Invalid description',
        'price.required' => 'price is required',
        'price.string' => 'Invalid price',
        'discount.required' => 'discount is required',
        'category.required' => 'category is required',
        'seller.required' => 'seller',
        );
        return $message;
    }
}
