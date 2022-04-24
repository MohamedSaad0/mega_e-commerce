<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Controllers\api\ApiAuthController;

class RegisterRequest extends FormRequest
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
            "name" => "required|string|min:3|max:30",
            "email" => "required|string|unique:users|email",
            "password" => "required|string|confirmed",
            "image" => "image|mimes:png,jpg",
            "address" => "required|string|min:3|max:80",
            "phone" => "required|string|digits:11",
        ];
    }

    public function message(){
        $message = array(
            'name.required' => 'Name is required',
            'name.min' => "Name must be more than 3 chars",
            'name.max' => "Name cant be more than 30 chars",
            'email.required' => 'Email is required',
            'email.unique' => 'This email already exists',
            'password.required' => "Password is required",
            'password.confirmed' => "Password doesn`t match",
            'image.required' => "Image is required",
            'address.required' => "Address is required",
            'phone.required' => "Phone is required",
        );
        return $message;
    }
}

