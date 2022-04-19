<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellerRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:15',
            'description' => 'required|string|min:3|max:15',
        ];
    }

    public function message(){
        $message = array(
            'name.required' => 'Name is required',
            'name.string' => 'Invalid Name',
            'description.required' => 'description is required',
            'description.string' => 'Invalid description',
        );
        return $message;
    }
}
