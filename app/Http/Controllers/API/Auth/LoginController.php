<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();
        }
        if ($user->hasVerifiedEmail()) {
            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json(['token' => $token]);
        } else {
            return response()->json(['error' => 'Please Verify Your Account'], 401);
        }


        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
