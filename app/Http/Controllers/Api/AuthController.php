<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'invalid_credentials'], 401);
        }
        return response()->json(['success' => true, 'token' => $token], 200);
    }

    public function checkToken()
    {
        return response()->json(['success' => true], 200);
    }

    public function logout()
    {
        $logout = auth()->logout();
        return response()->json(['success' => true], 200);
    }
}
