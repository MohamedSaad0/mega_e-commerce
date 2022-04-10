<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ApiAuthController extends Controller
{
    // register
    public function register(Request $request)
    {
        $request->validate([
            "name" => "required|string|min:3|max:30",
            "email" => "required|string|unique:users|email",
            "password" => "required|string|confirmed",
            "image" => "image|mimes:png,jpg",
            "address" => "required|string|min:3|max:80",
            "phone" => "required|string|digits:11",
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if($request->hasFile("image"))
        {
            $image = $request->file("image");
            $extension = $image->getClientOriginalExtension();
            $image_name = uniqid() . "." . $extension;
            $image->move(public_path("images/"), $image_name);
            $user->image = $image_name;
        }
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();

        $token = $user->createToken("token_name")->plainTextToken;
        return response()->json(["data" => $user, "token" => $token, "status" => 200], 200);
    }
    // login
    public function login(Request $request)
    {
        $data = User::where("email", $request->email)->first();
        if (!$data || !Hash::check($request->password, $data->password)) {
            throw ValidationException::withMessages([
                "email" => ["The provided credentials are incorrect."],
            ]);
        }
        $token = $data->createToken("token_name")->plainTextToken;
        return response()->json(["data" => $data, "token" => $token, "status" => 200], 200);
    }
    // logout
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json("Successfully logged out");
    }
}
