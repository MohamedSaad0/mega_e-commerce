<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\CategoryController;


class CategoryRequest extends FormRequest
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
            "name" => "required",
            "description" => "required",
            "image" => "required",
        ];
    }
    public function message() {
        $message = array(
            "name.required" => "Name is required",
            "description.required" => "Description is required",
            "image.required" => "Image is required",
        );
        return $message;
    }
}
