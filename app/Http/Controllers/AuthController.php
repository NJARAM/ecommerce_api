<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'mobile' => 'required|string|max:20',
            'password'=>'required|min:8'
        ]);
       $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => bcrypt($request->password),
        ]);

        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'token'=>$token,
            'expires_in' => 1440,
            'user'=>$user
        ]);
    }

public function login(Request $request)
{
    if(!Auth::attempt($request->only('email','password')))
    {
        return response()->json([
            'message'=>'Invalid credentials'
        ],401);
    }

    $user = Auth::user();

    $token = $user->createToken('API Token')->plainTextToken;

    return response()->json([
        'token'=>$token,
        'expires_in' => 1440,
        'user'=>$user
    ]);
}
public function logout(Request $request)
{
    $request->user()->currentAccessToken()->delete();

    return response()->json([
        'message'=>'Logged out successfully'
    ]);
}
public function health()
{
    return response()->json([
        'status'=>'ok',
        'timestamp'=>now()
    ],200);
}
}
