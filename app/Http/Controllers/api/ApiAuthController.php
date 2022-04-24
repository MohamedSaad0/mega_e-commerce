<?php

namespace App\Http\Controllers\api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Validation\ValidationException;

class ApiAuthController extends Controller
{
    // register
    public function register(RegisterRequest $request)
    {
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
    // forgot-password
    public function forgot_password(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $status = Password::sendResetLink(
            $request->only('email')
        );
        $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status)])
                    : back()->withErrors(['email' => __($status)]);
        return response()->json($status);
    }
}
